<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ItemCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemCategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_item_categories()
    {
        $itemCategories = ItemCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('item-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.item_categories.index')
            ->assertViewHas('itemCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_item_category()
    {
        $response = $this->get(route('item-categories.create'));

        $response->assertOk()->assertViewIs('app.item_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_item_category()
    {
        $data = ItemCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('item-categories.store'), $data);

        $this->assertDatabaseHas('item_categories', $data);

        $itemCategory = ItemCategory::latest('id')->first();

        $response->assertRedirect(route('item-categories.edit', $itemCategory));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_item_category()
    {
        $itemCategory = ItemCategory::factory()->create();

        $response = $this->get(route('item-categories.show', $itemCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.item_categories.show')
            ->assertViewHas('itemCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_item_category()
    {
        $itemCategory = ItemCategory::factory()->create();

        $response = $this->get(route('item-categories.edit', $itemCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.item_categories.edit')
            ->assertViewHas('itemCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_item_category()
    {
        $itemCategory = ItemCategory::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('item-categories.update', $itemCategory),
            $data
        );

        $data['id'] = $itemCategory->id;

        $this->assertDatabaseHas('item_categories', $data);

        $response->assertRedirect(route('item-categories.edit', $itemCategory));
    }

    /**
     * @test
     */
    public function it_deletes_the_item_category()
    {
        $itemCategory = ItemCategory::factory()->create();

        $response = $this->delete(
            route('item-categories.destroy', $itemCategory)
        );

        $response->assertRedirect(route('item-categories.index'));

        $this->assertDeleted($itemCategory);
    }
}
