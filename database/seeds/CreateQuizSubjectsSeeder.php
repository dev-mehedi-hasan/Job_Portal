<?php

use Illuminate\Database\Seeder;
use App\QuizSubject;

class CreateQuizSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizsubject = [
            [
	            'subject_name' => 'Programming',
	        ],
            [
	            'subject_name' => 'Networking',
            ],
            [
	            'subject_name' => 'Graphics Design',
            ],
            [
	            'subject_name' => 'Accounting',
	        ],
            [
	            'subject_name' => 'Marketing',
            ],
            [
	            'subject_name' => 'Hardware',
            ],
        ];
  
        foreach ($quizsubject as $key => $value) {
            QuizSubject::create($value);
        }
    }
}
