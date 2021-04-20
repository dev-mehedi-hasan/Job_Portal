<?php

use Illuminate\Database\Seeder;
use App\QuizQuestion;

class CreateQuizQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizquestion = [
            [
	            'quiz_subject_id' => '1',
	            'q1' => 'When does the ArrayIndexOutOfBoundsException occur?',
                'a1' => 'Run-time',
                'q2' => 'Assuming int is of 4bytes, what is the size of int arr[15];?',
                'a2' => '60',
                'q3' => 'Pure OOP can be implemented without using class in a program. (True or False)',
                'a3' => 'False',
                'q4' => 'Which function sets the file filename last-modified and last-accessed times?',
                'a4' => 'touch()',
                'q5' => 'What will be the output of the following JavaScript code?

                <p id="demo"></p>
                <script>
                document.getElementById("demo").innerHTML = Number(true); 
                </script>',
                'a5' => '1',
                   
	        ],
        ];
  
        foreach ($quizquestion as $key => $value) {
            QuizQuestion::create($value);
        }
    }
}
