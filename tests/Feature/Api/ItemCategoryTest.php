<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ItemCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemCategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_item_categories_list()
    {
        $itemCategories = ItemCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.item-categories.index'));

        $response->assertOk()->assertSee($itemCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_item_category()
    {
        $data = ItemCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.item-categories.store'), $data);

        $this->assertDatabaseHas('item_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.item-categories.update', $itemCategory),
            $data
        );

        $data['id'] = $itemCategory->id;

        $this->assertDatabaseHas('item_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_item_category()
    {
        $itemCategory = ItemCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.item-categories.destroy', $itemCategory)
        );

        $this->assertDeleted($itemCategory);

        $response->assertNoContent();
    }
}
