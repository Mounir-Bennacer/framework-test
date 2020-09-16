<?php

use Illuminate\Database\Seeder;
use App\Companies;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creating 100 companies
        factory(Companies::class, 100)->create()->each(function($c){
            $c->save();
        });
    }
}
