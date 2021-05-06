<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Employee extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function job(){

    	return $this->hasOne('App\Models\Job');

    }
}
