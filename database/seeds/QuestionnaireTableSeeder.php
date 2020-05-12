<?php

use Illuminate\Database\Seeder;

class QuestionnaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('questionnaires')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
        DB::table('questionnaires')->insert([
            ['questionnaireId' => 1, 'user_id' => 1, 'title' => "Do you understand how a questionnaire is constructed and why?", 'ethics' => "By submitting answers on this questionnaire you will be providing anonymous data and by submitting you agree to these terms", 'created_at' => date("Y-m-d H:i:s") ],
        ]);
    }
}
