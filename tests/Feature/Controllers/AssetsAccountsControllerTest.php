<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AssetsAccounts;

use App\Models\AssetTypes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetsAccountsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_assets_accounts()
    {
        $allAssetsAccounts = AssetsAccounts::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-assets-accounts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_assets_accounts.index')
            ->assertViewHas('allAssetsAccounts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_assets_accounts()
    {
        $response = $this->get(route('all-assets-accounts.create'));

        $response->assertOk()->assertViewIs('app.all_assets_accounts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_assets_accounts()
    {
        $data = AssetsAccounts::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-assets-accounts.store'), $data);

        $this->assertDatabaseHas('assets_accounts', $data);

        $assetsAccounts = AssetsAccounts::latest('id')->first();

        $response->assertRedirect(
            route('all-assets-accounts.edit', $assetsAccounts)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_assets_accounts()
    {
        $assetsAccounts = AssetsAccounts::factory()->create();

        $response = $this->get(
            route('all-assets-accounts.show', $assetsAccounts)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_assets_accounts.show')
            ->assertViewHas('assetsAccounts');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_assets_accounts()
    {
        $assetsAccounts = AssetsAccounts::factory()->create();

        $response = $this->get(
            route('all-assets-accounts.edit', $assetsAccounts)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_assets_accounts.edit')
            ->assertViewHas('assetsAccounts');
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

        $response = $this->put(
            route('all-assets-accounts.update', $assetsAccounts),
            $data
        );

        $data['id'] = $assetsAccounts->id;

        $this->assertDatabaseHas('assets_accounts', $data);

        $response->assertRedirect(
            route('all-assets-accounts.edit', $assetsAccounts)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_assets_accounts()
    {
        $assetsAccounts = AssetsAccounts::factory()->create();

        $response = $this->delete(
            route('all-assets-accounts.destroy', $assetsAccounts)
        );

        $response->assertRedirect(route('all-assets-accounts.index'));

        $this->assertDeleted($assetsAccounts);
    }
}
