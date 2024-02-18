<?php

namespace App\Http\Controllers;

use App\Interfaces\IbaNumberRepositoryInterface;

class IbanController extends Controller
{
    /**
     * @var IbaNumberRepositoryInterface
     */
    private IbaNumberRepositoryInterface $ibaNumberRepository;

    /**
     * @param IbaNumberRepositoryInterface $ibaNumberRepository
     */
    public function __construct(IbaNumberRepositoryInterface $ibaNumberRepository)
    {
        $this->ibaNumberRepository = $ibaNumberRepository;
    }

    /**
     * @return mixed
     */
    public function ibanData()
    {
        return $this->ibaNumberRepository->getAll();
    }
}
