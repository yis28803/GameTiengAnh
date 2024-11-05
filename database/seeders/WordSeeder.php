<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;

class WordSeeder extends Seeder
{
    public function run()
    {
        $words = ['apple', 'table', 'chair', 'hello', 'world'];
        foreach ($words as $word) {
            Word::create(['word' => $word]);
        }
    }
}
