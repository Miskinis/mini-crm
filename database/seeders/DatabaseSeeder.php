<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(25)->has(Employee::factory()->count(5), 'employees')->create();

        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'password' => bcrypt('password'),
             'created_at' => Carbon::now()]);
    }
}
