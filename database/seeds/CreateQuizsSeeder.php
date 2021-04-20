<?php

use Illuminate\Database\Seeder;
use App\Quiz;

class CreateQuizsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = [
            [
	            'quizquestion_id' => '1',
	            'participant_id' => '2',
                'status' => '1',
                'mark' => '4',
	        ],
        ];
  
        foreach ($quiz as $key => $value) {
            Quiz::create($value);
        }
    }
}
