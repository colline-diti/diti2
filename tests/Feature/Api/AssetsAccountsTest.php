<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AssetsAccounts;

use App\Models\AssetTypes;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetsAccountsTest extends TestCase
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
    public function it_gets_all_assets_accounts_list()
    {
        $allAssetsAccounts = AssetsAccounts::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-assets-accounts.index'));

        $response->assertOk()->assertSee($allAssetsAccounts[0]->asset_name);
    }

    /**
     * @test
     */
    public function it_stores_the_assets_accounts()
    {
        $data = AssetsAccounts::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-assets-accounts.store'),
            $data
        );

        $this->assertDatabaseHas('assets_accounts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_assets_accounts()
    {
        $assetsAccounts = AssetsAccounts::factory()->create();

        $assetTypes = AssetTypes::factory()->create();

        $data = [
            'asset_name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber,
            'supplier' => $this->faker->text(255),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'asset_types_id' => $assetTypes->id,
        ];

        $response = $this->putJson(
            route('api.all-assets-accounts.update', $assetsAccounts),
            $data
        );

        $data['id'] = $assetsAccounts->id;

        $this->assertDatabaseHas('assets_accounts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_assets_accounts()
    {
        $assetsAccounts = AssetsAccounts::factory()->create();

        $response = $this->deleteJson(
            route('api.all-assets-accounts.destroy', $assetsAccounts)
        );

        $this->assertDeleted($assetsAccounts);

        $response->assertNoContent();
    }
}
