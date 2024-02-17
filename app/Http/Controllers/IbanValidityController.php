<?php

namespace App\Http\Controllers;

use App\Http\Requests\IbanValidityRequest;
use App\Interfaces\CountryValueRepositoryInterface;

class IbanValidityController extends Controller
{
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

        // Define IBAN lengths for different countries
        $ibanLengths = [
            'AL' => 28, 'AD' => 24, 'AT' => 20, 'AZ' => 28, 'BH' => 22,
            // Add more country codes and lengths here...
        ];

        // Remove spaces and convert to lowercase
        $iban = strtolower(preg_replace('/\s+/', '', $iban));

        // Check if the length of the IBAN is valid
        if (strlen($iban) < 2) {
            return false;
        }

        // Extract the country code
        $countryCode = substr($iban, 0, 2);

        // Check if the country code is supported and the length is correct
        if (isset($ibanLengths[$countryCode]) && strlen($iban) == $ibanLengths[$countryCode]) {
            // Reorder IBAN and convert letters to digits
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

            // Check if IBAN is valid using modulo 97
            if (bcmod($converted, '97') == 1) {
                return true;
            }
        }

        return false;
    }
}
