<?php

namespace App\Http\Controllers;

use App\Http\Requests\IbanValidityRequest;
use App\Interfaces\CountryValueRepositoryInterface;

class IbanValidityController extends Controller
{
    /**
     * @var CountryValueRepositoryInterface
     */
    private CountryValueRepositoryInterface $countryValueRepository;

    /**
     * @param CountryValueRepositoryInterface $countryValueRepository
     */
    public function __construct(CountryValueRepositoryInterface $countryValueRepository)
    {
        $this->countryValueRepository = $countryValueRepository;
    }

    public function checkValidity(IbanValidityRequest $request)
    {
        $iban = $request->get('iba_number');

        dd($this->countryValueRepository->getAll());

        $ibanLengths = [
            'AL' => 28, 'AD' => 24, 'AT' => 20, 'AZ' => 28, 'BH' => 22,
        ];

        $iban = strtolower(preg_replace('/\s+/', '', $iban));

        if (strlen($iban) < 2) {
            return false;
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

            if (bcmod($converted, '97') == 1) {
                return true;
            }
        }

        return false;
    }
}
