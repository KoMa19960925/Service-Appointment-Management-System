<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_render_with_the_shared_layout(): void
    {
        foreach (['home', 'about', 'loginpage', 'registerpage'] as $route) {
            $this->get(route($route))->assertOk()->assertSee('sams.css');
        }
    }

    public function test_each_role_can_open_its_dashboard(): void
    {
        foreach (['Admin', 'Customer', 'Technician'] as $role) {
            $user = User::factory()->create(['role' => strtolower($role)]);

            $this->actingAs($user)->get(route("$role.dashboard"))
                ->assertOk()
                ->assertSeeText("$role Dashboard")
                ->assertSee('sams.css');
        }
    }
}
