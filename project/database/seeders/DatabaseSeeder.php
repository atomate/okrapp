<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\KeyResult;
use App\Models\Objective;
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
        Company::factory(2)->has(Objective::factory(2)->has(KeyResult::factory(2)))->create();
    }
}
