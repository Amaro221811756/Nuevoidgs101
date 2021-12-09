<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model {
    // use HasFactory;
    protected $table ='city';
    //protected $primaryKey='Code';
    protected $CountryCode;
    protected $District;
    protected $ID;
    protected $Name;
    protected $Population;
    public $timestamps = false;
}