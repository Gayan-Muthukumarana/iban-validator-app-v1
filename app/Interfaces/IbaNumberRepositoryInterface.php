<?php

namespace App\Interfaces;

interface IbaNumberRepositoryInterface
{
    public function getAll();
    public function create($data);
}
