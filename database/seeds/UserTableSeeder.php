<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
        DB::table('users')->insert([
            ['id' => 1, 'name' => "Shaun Halliday", 'email' => "shaunhalliday1512@gmail.com", 'password' => bcrypt('Rooney10!'), 'created_at' => date("Y-m-d H:i:s") ],
        ]);
    }
}
