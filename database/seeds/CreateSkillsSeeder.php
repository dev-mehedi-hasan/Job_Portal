<?php

use Illuminate\Database\Seeder;
use App\Skill;

class CreateSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $skill = [
            [
	            'user_id' => '2',
	            'skill_name' => 'PHP',
	        ],
            [
	            'user_id' => '2',
	            'skill_name' => 'C#',
            ],
            [
	            'user_id' => '2',
	            'skill_name' => 'UI Design',
            ],
        ];

        foreach ($skill as $key => $value) {
            Skill::create($value);
        }

    }
}
