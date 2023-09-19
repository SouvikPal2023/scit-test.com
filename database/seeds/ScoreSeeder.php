<?php

use Illuminate\Database\Seeder;
use App\Score;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Score::insert([
            ['scorecategory' => '1', 'scorevalue' => 'Strongly Disagree', 'scorenumber'=>'6'],
            ['scorecategory' => '2', 'scorevalue' => 'a', 'scorenumber'=>'3'],
            ['scorecategory' => '3', 'scorevalue' => 'true', 'scorenumber'=>'1'],
            ['scorecategory' => '3', 'scorevalue' => 'false', 'scorenumber'=>'2'],
        ]);
    }
}
