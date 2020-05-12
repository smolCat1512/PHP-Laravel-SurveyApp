<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('answers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
        DB::table('answers')->insert([
            ['answerId' => 1, 'user_id' => 1, 'question_id' => 1, 'answer' => "Yes or no", 'created_at' => date("Y-m-d H:i:s") ],
            ['answerId' => 2, 'user_id' => 1, 'question_id' => 2, 'answer' => "Yes or no", 'created_at' => date("Y-m-d H:i:s") ],
            ['answerId' => 3, 'user_id' => 1, 'question_id' => 3, 'answer' => "Yes or no", 'created_at' => date("Y-m-d H:i:s") ],
            ['answerId' => 4, 'user_id' => 1, 'question_id' => 4, 'answer' => "Yes or no", 'created_at' => date("Y-m-d H:i:s") ],
            ['answerId' => 5, 'user_id' => 1, 'question_id' => 5, 'answer' => "Online, in person, post, not applicable", 'created_at' => date("Y-m-d H:i:s") ],
        ]);
    }
}
