<?php

namespace Database\Seeders;

use App\Models\Sitting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SittingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sittings')->insert([
            [
                'key' => "title",
                'value' => env('APP_NAME'),
            ],
            [
                'key' => "description",
                'value' => 'description'
            ],
            [
                'key' => "facebook",
                'value' => ''
            ],
            [
                'key' => "instagram",
                'value' => ''
            ],
            [
                'key' => "twitter",
                'value' => ''
            ],
            [
                'key' => "github",
                'value' => ''
            ],
            [
                'key' => "linkedin",
                'value' => ''
            ]
        ]);
    }
}
