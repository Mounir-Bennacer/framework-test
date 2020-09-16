<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employees;

class Companies extends Model
{
    protected $fillable = ['name','email','logo','website'];

    public function employees(){
        return $this->hasMany(Employees::class);
    }
}
