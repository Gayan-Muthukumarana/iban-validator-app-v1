<?php

namespace App\Repositories;

use App\Interfaces\IbaNumberRepositoryInterface;
use App\Models\IbaNumber;

class IbaNumberRepository implements IbaNumberRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return IbaNumber::with('user')->get();
    }
}
