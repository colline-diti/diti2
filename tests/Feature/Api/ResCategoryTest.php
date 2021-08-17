<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResCategoryTest extends TestCase
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
    public function it_gets_res_categories_list()
    {
        $resCategories = ResCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.res-categories.index'));

        $response->assertOk()->assertSee($resCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_res_category()
    {
        $data = ResCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.res-categories.store'), $data);

        unset($data['description']);

        $this->assertDatabaseHas('res_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.res-categories.update', $resCategory),
            $data
        );

        unset($data['description']);

        $data['id'] = $resCategory->id;

        $this->assertDatabaseHas('res_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_res_category()
    {
        $resCategory = ResCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.res-categories.destroy', $resCategory)
        );

        $this->assertDeleted($resCategory);

        $response->assertNoContent();
    }
}
