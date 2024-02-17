<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryValue extends Model
{
    protected $fillable = [
        'country_code',
        'value'
    ];
}
