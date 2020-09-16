<?php

use Illuminate\Database\Seeder;
use App\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creating 10 employees
        factory(App\Employees::class, 100)->create()->each(function($e){
            $e->save();
        });
    }
}
