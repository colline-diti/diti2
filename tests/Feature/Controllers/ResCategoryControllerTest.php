<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ResCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_res_categories()
    {
        $resCategories = ResCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('res-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.res_categories.index')
            ->assertViewHas('resCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_res_category()
    {
        $response = $this->get(route('res-categories.create'));

        $response->assertOk()->assertViewIs('app.res_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_res_category()
    {
        $data = ResCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('res-categories.store'), $data);

        unset($data['description']);

        $this->assertDatabaseHas('res_categories', $data);

        $resCategory = ResCategory::latest('id')->first();

        $response->assertRedirect(route('res-categories.edit', $resCategory));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_res_category()
    {
        $resCategory = ResCategory::factory()->create();

        $response = $this->get(route('res-categories.show', $resCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.res_categories.show')
            ->assertViewHas('resCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_res_category()
    {
        $resCategory = ResCategory::factory()->create();

        $response = $this->get(route('res-categories.edit', $resCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.res_categories.edit')
            ->assertViewHas('resCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_res_category()
    {
        $resCategory = ResCategory::factory()->create();

        $data = [
            'name' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('res-categories.update', $resCategory),
            $data
        );

        unset($data['description']);

        $data['id'] = $resCategory->id;

        $this->assertDatabaseHas('res_categories', $data);

        $response->assertRedirect(route('res-categories.edit', $resCategory));
    }

    /**
     * @test
     */
    public function it_deletes_the_res_category()
    {
        $resCategory = ResCategory::factory()->create();

        $response = $this->delete(
            route('res-categories.destroy', $resCategory)
        );

        $response->assertRedirect(route('res-categories.index'));

        $this->assertDeleted($resCategory);
    }
}
