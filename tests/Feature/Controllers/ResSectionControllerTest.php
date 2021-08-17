<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ResSection;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResSectionControllerTest extends TestCase
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
    public function it_displays_index_view_with_res_sections()
    {
        $resSections = ResSection::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('res-sections.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.res_sections.index')
            ->assertViewHas('resSections');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_res_section()
    {
        $response = $this->get(route('res-sections.create'));

        $response->assertOk()->assertViewIs('app.res_sections.create');
    }

    /**
     * @test
     */
    public function it_stores_the_res_section()
    {
        $data = ResSection::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('res-sections.store'), $data);

        unset($data['description']);

        $this->assertDatabaseHas('res_sections', $data);

        $resSection = ResSection::latest('id')->first();

        $response->assertRedirect(route('res-sections.edit', $resSection));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_res_section()
    {
        $resSection = ResSection::factory()->create();

        $response = $this->get(route('res-sections.show', $resSection));

        $response
            ->assertOk()
            ->assertViewIs('app.res_sections.show')
            ->assertViewHas('resSection');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_res_section()
    {
        $resSection = ResSection::factory()->create();

        $response = $this->get(route('res-sections.edit', $resSection));

        $response
            ->assertOk()
            ->assertViewIs('app.res_sections.edit')
            ->assertViewHas('resSection');
    }

    /**
     * @test
     */
    public function it_updates_the_res_section()
    {
        $resSection = ResSection::factory()->create();

        $data = [
            'section_name' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('res-sections.update', $resSection),
            $data
        );

        unset($data['description']);

        $data['id'] = $resSection->id;

        $this->assertDatabaseHas('res_sections', $data);

        $response->assertRedirect(route('res-sections.edit', $resSection));
    }

    /**
     * @test
     */
    public function it_deletes_the_res_section()
    {
        $resSection = ResSection::factory()->create();

        $response = $this->delete(route('res-sections.destroy', $resSection));

        $response->assertRedirect(route('res-sections.index'));

        $this->assertDeleted($resSection);
    }
}
