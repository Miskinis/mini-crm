<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    public function test_companies_auth_access()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('companies.index'))->assertSee('companies');

        $response->assertStatus(200);
    }

    public function test_companies_no_auth_access()
    {
        $response = $this->get(route('companies.index'));

        $response->assertRedirect(route('login'));
    }
}
