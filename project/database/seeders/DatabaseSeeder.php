<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Objective;
use App\Models\KeyResult;
use App\Models\Team;
use App\Models\User;
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
        User::factory(3)
            ->has(Company::factory(3)
                ->has(Team::factory(3)
                    ->has(Objective::factory(2)
                        ->state(function (array $attributes, Team $team) {
                        return ['company_id' => $team->company_id];
                    })->has(KeyResult::factory(3)))))
            ->create();
    }
}
