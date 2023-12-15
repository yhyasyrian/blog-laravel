<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = ['admin','user','writer'];
        array_map(function ($rule) {
            Rule::create(['name'=>$rule]);
        },$rules);
    }
}
