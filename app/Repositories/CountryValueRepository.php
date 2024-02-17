<?php

namespace App\Repositories;

use App\Interfaces\CountryValueRepositoryInterface;
use App\Models\CountryValue;

class CountryValueRepository implements CountryValueRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return CountryValue::all();
    }
}
