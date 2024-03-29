<?php

namespace App\Http\Controllers;

use App\Http\Requests\IbanValidityRequest;
use App\Interfaces\CountryValueRepositoryInterface;
use App\Interfaces\IbaNumberRepositoryInterface;

class IbanValidityController extends Controller
{
    /**
     * @var CountryValueRepositoryInterface
     */
    private CountryValueRepositoryInterface $countryValueRepository;
    /**
     * @var IbaNumberRepositoryInterface
     */
    private IbaNumberRepositoryInterface $ibaNumberRepository;

    /**
     * @param CountryValueRepositoryInterface $countryValueRepository
     * @param IbaNumberRepositoryInterface $ibaNumberRepository
     */
    public function __construct(CountryValueRepositoryInterface $countryValueRepository, IbaNumberRepositoryInterface $ibaNumberRepository)
    {
        $this->countryValueRepository = $countryValueRepository;
        $this->ibaNumberRepository = $ibaNumberRepository;
    }

    /**
     * @param IbanValidityRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function checkValidity(IbanValidityRequest $request)
    {
        $ibanNumber = $request->get('iba_number');

        $countryValues = $this->countryValueRepository->getAll();
        $ibanLengths = [];
        foreach ($countryValues as $countryValue) {
            $ibanLengths[$countryValue->country_code] = $countryValue->value;
        }

        $iban = strtolower(preg_replace('/\s+/', '', $ibanNumber));

        if (strlen($iban) < 2) {
            return $this->errorJsonResponse('Invalid IBA number', 422, false);
        }

        $countryCode = substr($iban, 0, 2);

        if (isset($ibanLengths[$countryCode]) && strlen($iban) == $ibanLengths[$countryCode]) {
            $reordered = substr($iban, 4) . substr($iban, 0, 4);
            $chars = str_split($reordered);
            $converted = '';
            foreach ($chars as $char) {
                if (!is_numeric($char)) {
                    $converted .= (ord($char) - ord('a') + 10);
                } else {
                    $converted .= $char;
                }
            }

            if ($this->bcmod($converted, '97') == 1) {
                $ibanData = [
                    'iba_number' => $request->get('iba_number'),
                    'user_id' => $request->get('user_id')
                ];
                $data = $this->ibaNumberRepository->create($ibanData);
                return $this->successJsonResponse($data, 'Your entered IBA Number is valid', 200);
            }
        }

        return $this->errorJsonResponse('Invalid IBA number', 422, false);
    }

    /**
     * @param $x
     * @param $y
     * @return int
     */
    function bcmod($x, $y)
    {
        $take = 5;
        $mod = '';

        do {
            $a = (int)$mod.substr($x, 0, $take);
            $x = substr($x, $take);
            $mod = $a % $y;
        }
        while (strlen($x));

        return (int)$mod;
    }
}
