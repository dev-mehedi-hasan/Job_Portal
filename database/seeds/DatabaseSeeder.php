<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	 $this->call(CreateUsersSeeder::class);
    	 $this->call(CreateInfosSeeder::class);
         $this->call(CreateEducationsSeeder::class);
         $this->call(CreateSkillsSeeder::class);
         $this->call(CreateProjectsSeeder::class);
         $this->call(CreateJobsSeeder::class);
         $this->call(CreateApplicationsSeeder::class);
         $this->call(CreateQuizSubjectsSeeder::class);
         $this->call(CreateQuizQuestionsSeeder::class);
         $this->call(CreateQuizsSeeder::class);
    }
}
