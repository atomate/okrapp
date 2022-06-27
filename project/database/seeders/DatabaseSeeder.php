<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Objective;
use App\Models\KeyResult;
use App\Models\User;
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
        User::factory(2)->has(Company::factory(1)->has(Objective::factory(3)->has(KeyResult::factory(2))))->create();
    }
}
