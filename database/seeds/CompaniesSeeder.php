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
        factory(Companies::class, 100);
    }
}
