<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Country::truncate();
        $json = file_get_contents(base_path('database/seeders/countries.json'), true);

//        $json = Storage::disk('local')->get('/json/countries.json');
        $countries = json_decode($json, true);
        foreach ($countries as $key => $value) {
            Country::query()->updateOrCreate([
                "num_code" => $value['num_code'],
                "alpha_2_code" => $value['alpha_2_code'],
                "alpha_3_code" => $value['alpha_3_code'],
                "en_short_name" => $value['en_short_name'],
                "nationality" => $value['nationality']
            ]);
        }
    }
}
