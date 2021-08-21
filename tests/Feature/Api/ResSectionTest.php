<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ResSection;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResSectionTest extends TestCase
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
    public function it_gets_res_sections_list()
    {
        $resSections = ResSection::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.res-sections.index'));

        $response->assertOk()->assertSee($resSections[0]->section_name);
    }

    /**
     * @test
     */
    public function it_stores_the_res_section()
    {
        $data = ResSection::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.res-sections.store'), $data);

        $this->assertDatabaseHas('res_sections', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.res-sections.update', $resSection),
            $data
        );

        $data['id'] = $resSection->id;

        $this->assertDatabaseHas('res_sections', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_res_section()
    {
        $resSection = ResSection::factory()->create();

        $response = $this->deleteJson(
            route('api.res-sections.destroy', $resSection)
        );

        $this->assertDeleted($resSection);

        $response->assertNoContent();
    }
}
