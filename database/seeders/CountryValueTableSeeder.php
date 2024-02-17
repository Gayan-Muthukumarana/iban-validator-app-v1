<?php

namespace Database\Seeders;

use App\Models\CountryValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CountryValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (CountryValue::all()->count() > 0) {
            echo 'Already ran the seeder';
        } else {
            $countries = [
                ['country_code' => 'al', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ad', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'at', 'value' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'az', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'bh', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'be', 'value' => 16, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ba', 'value' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'br', 'value' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'bg', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'cr', 'value' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'hr', 'value' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'cy', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'cz', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'dk', 'value' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'do', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ee', 'value' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'fo', 'value' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'fi', 'value' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'fr', 'value' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ge', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'de', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'gi', 'value' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'gr', 'value' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'gl', 'value' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'gt', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'hu', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'is', 'value' => 26, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ie', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'il', 'value' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'it', 'value' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'jo', 'value' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'kz', 'value' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'kw', 'value' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'lv', 'value' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'lb', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'li', 'value' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'lt', 'value' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'lu', 'value' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'mk', 'value' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'mt', 'value' => 31, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'mr', 'value' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'mu', 'value' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'mc', 'value' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'md', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'me', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'nl', 'value' => 18, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'no', 'value' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'pk', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ps', 'value' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'pl', 'value' => 28, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'pt', 'value' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'qa', 'value' => 29, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ro', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'sm', 'value' => 27, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'sa', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'rs', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'sk', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'si', 'value' => 19, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'es', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'se', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ch', 'value' => 21, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'tn', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'tr', 'value' => 26, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'ae', 'value' => 23, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'gb', 'value' => 22, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['country_code' => 'vg', 'value' => 24, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ];

            CountryValue::insert($countries);
        }
    }
}
