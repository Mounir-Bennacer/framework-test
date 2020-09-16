<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Companies;

class Employees extends Model
{
    // fillable
    protected $fillable = ['first_name','last_name','email','phone','companies_id'];

    public function companies(){
        return $this->belongsTo(Companies::class);
    }
}
