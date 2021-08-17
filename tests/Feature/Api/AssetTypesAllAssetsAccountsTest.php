<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AssetTypes;
use App\Models\AssetsAccounts;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetTypesAllAssetsAccountsTest extends TestCase
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
    public function it_gets_asset_types_all_assets_accounts()
    {
        $assetTypes = AssetTypes::factory()->create();
        $allAssetsAccounts = AssetsAccounts::factory()
            ->count(2)
            ->create([
                'asset_types_id' => $assetTypes->id,
            ]);

        $response = $this->getJson(
            route('api.all-asset-types.all-assets-accounts.index', $assetTypes)
        );

        $response->assertOk()->assertSee($allAssetsAccounts[0]->asset_name);
    }

    /**
     * @test
     */
    public function it_stores_the_asset_types_all_assets_accounts()
    {
        $assetTypes = AssetTypes::factory()->create();
        $data = AssetsAccounts::factory()
            ->make([
                'asset_types_id' => $assetTypes->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-asset-types.all-assets-accounts.store', $assetTypes),
            $data
        );

        $this->assertDatabaseHas('assets_accounts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $assetsAccounts = AssetsAccounts::latest('id')->first();

        $this->assertEquals($assetTypes->id, $assetsAccounts->asset_types_id);
    }
}
