<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AssetTypes;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetTypesTest extends TestCase
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
    public function it_gets_all_asset_types_list()
    {
        $allAssetTypes = AssetTypes::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-asset-types.index'));

        $response->assertOk()->assertSee($allAssetTypes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_asset_types()
    {
        $data = AssetTypes::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-asset-types.store'), $data);

        $this->assertDatabaseHas('asset_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_asset_types()
    {
        $assetTypes = AssetTypes::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(
            route('api.all-asset-types.update', $assetTypes),
            $data
        );

        $data['id'] = $assetTypes->id;

        $this->assertDatabaseHas('asset_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_asset_types()
    {
        $assetTypes = AssetTypes::factory()->create();

        $response = $this->deleteJson(
            route('api.all-asset-types.destroy', $assetTypes)
        );

        $this->assertDeleted($assetTypes);

        $response->assertNoContent();
    }
}
