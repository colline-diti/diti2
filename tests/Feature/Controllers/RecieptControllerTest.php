<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Reciept;

use App\Models\ResProduct;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecieptControllerTest extends TestCase
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
    public function it_displays_index_view_with_reciepts()
    {
        $reciepts = Reciept::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('reciepts.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.reciepts.index')
            ->assertViewHas('reciepts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_reciept()
    {
        $response = $this->get(route('reciepts.create'));

        $response->assertOk()->assertViewIs('app.reciepts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_reciept()
    {
        $data = Reciept::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('reciepts.store'), $data);

        $this->assertDatabaseHas('reciepts', $data);

        $reciept = Reciept::latest('id')->first();

        $response->assertRedirect(route('reciepts.edit', $reciept));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_reciept()
    {
        $reciept = Reciept::factory()->create();

        $response = $this->get(route('reciepts.show', $reciept));

        $response
            ->assertOk()
            ->assertViewIs('app.reciepts.show')
            ->assertViewHas('reciept');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_reciept()
    {
        $reciept = Reciept::factory()->create();

        $response = $this->get(route('reciepts.edit', $reciept));

        $response
            ->assertOk()
            ->assertViewIs('app.reciepts.edit')
            ->assertViewHas('reciept');
    }

    /**
     * @test
     */
    public function it_updates_the_reciept()
    {
        $reciept = Reciept::factory()->create();

        $resProduct = ResProduct::factory()->create();

        $data = [
            'quantity' => $this->faker->randomNumber,
            'cash' => $this->faker->randomNumber(0),
            'change' => $this->faker->randomNumber(0),
            'balance' => $this->faker->randomNumber(0),
            'total' => $this->faker->randomNumber(0),
            'served_by' => $this->faker->text(255),
            'res_product_id' => $resProduct->id,
        ];

        $response = $this->put(route('reciepts.update', $reciept), $data);

        $data['id'] = $reciept->id;

        $this->assertDatabaseHas('reciepts', $data);

        $response->assertRedirect(route('reciepts.edit', $reciept));
    }

    /**
     * @test
     */
    public function it_deletes_the_reciept()
    {
        $reciept = Reciept::factory()->create();

        $response = $this->delete(route('reciepts.destroy', $reciept));

        $response->assertRedirect(route('reciepts.index'));

        $this->assertDeleted($reciept);
    }
}
