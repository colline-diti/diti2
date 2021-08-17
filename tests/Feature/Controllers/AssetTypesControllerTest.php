<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AssetTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetTypesControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_asset_types()
    {
        $allAssetTypes = AssetTypes::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-asset-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_asset_types.index')
            ->assertViewHas('allAssetTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_asset_types()
    {
        $response = $this->get(route('all-asset-types.create'));

        $response->assertOk()->assertViewIs('app.all_asset_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_asset_types()
    {
        $data = AssetTypes::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-asset-types.store'), $data);

        $this->assertDatabaseHas('asset_types', $data);

        $assetTypes = AssetTypes::latest('id')->first();

        $response->assertRedirect(route('all-asset-types.edit', $assetTypes));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_asset_types()
    {
        $assetTypes = AssetTypes::factory()->create();

        $response = $this->get(route('all-asset-types.show', $assetTypes));

        $response
            ->assertOk()
            ->assertViewIs('app.all_asset_types.show')
            ->assertViewHas('assetTypes');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_asset_types()
    {
        $assetTypes = AssetTypes::factory()->create();

        $response = $this->get(route('all-asset-types.edit', $assetTypes));

        $response
            ->assertOk()
            ->assertViewIs('app.all_asset_types.edit')
            ->assertViewHas('assetTypes');
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

        $response = $this->put(
            route('all-asset-types.update', $assetTypes),
            $data
        );

        $data['id'] = $assetTypes->id;

        $this->assertDatabaseHas('asset_types', $data);

        $response->assertRedirect(route('all-asset-types.edit', $assetTypes));
    }

    /**
     * @test
     */
    public function it_deletes_the_asset_types()
    {
        $assetTypes = AssetTypes::factory()->create();

        $response = $this->delete(
            route('all-asset-types.destroy', $assetTypes)
        );

        $response->assertRedirect(route('all-asset-types.index'));

        $this->assertDeleted($assetTypes);
    }
}
