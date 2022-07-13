<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    public function test_emplyees_auth_access()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('employees.index'))->assertSee('employees');

        $response->assertStatus(200);
    }

    public function test_companies_no_auth_access()
    {
        $response = $this->get(route('employees.index'));

        $response->assertRedirect(route('login'));
    }
}
