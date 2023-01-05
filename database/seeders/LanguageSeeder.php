<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(base_path('database/seeders/languages.json'), true);

//        $json = Storage::disk('local')->get('/json/languages.json');
        $languages = json_decode($json, true);
        foreach ($languages as $key => $value) {
            Language::query()->updateOrCreate([
                "english" => $value['english'],
                "alpha2" => $value['alpha2'],
                "alpha3-b" => $value['alpha3-b']
            ]);
        }
    }
}
