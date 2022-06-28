<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testHasShortName() {
        $company = new Company();
        $company->name = "Microsoft";
        //var_dump($company->hasShortName());
        $this->assertTrue($company->hasShortName());
        $company->name = "MicrosoftOracle";
        $this->assertFalse($company->hasShortName());
    }

}
