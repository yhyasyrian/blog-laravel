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
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'key' => "description",
                'value' => 'description',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'key' => "facebook",
                'value' => '',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'key' => "instagram",
                'value' => '',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'key' => "twitter",
                'value' => '',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'key' => "github",
                'value' => '',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'key' => "linkedin",
                'value' => '',
                'updated_at' => now(),
                'created_at' => now()
            ]
        ]);
    }
}
