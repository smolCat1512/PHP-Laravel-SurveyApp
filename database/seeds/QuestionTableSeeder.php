<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('questions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
        DB::table('questions')->insert([
            ['questionId' => 1, 'user_id' => 1, 'questionnaire_id' => 1, 'question' => "Do you understand why a questionnaire is created?", 'created_at' => date("Y-m-d H:i:s") ],
            ['questionId' => 2, 'user_id' => 1, 'questionnaire_id' => 1, 'question' => "Do you understand the first step taken when formulating a questionnaire?", 'created_at' => date("Y-m-d H:i:s") ],
            ['questionId' => 3, 'user_id' => 1, 'questionnaire_id' => 1, 'question' => "Do you realise questionnaires are used for all manner of marketing and research purposes?", 'created_at' => date("Y-m-d H:i:s") ],
            ['questionId' => 4, 'user_id' => 1, 'questionnaire_id' => 1, 'question' => "Have you ever completed a questionnaire?", 'created_at' => date("Y-m-d H:i:s") ],
            ['questionId' => 5, 'user_id' => 1, 'questionnaire_id' => 1, 'question' => "What type of setting did you complete this in?", 'created_at' => date("Y-m-d H:i:s") ],
        ]);
    }
}
