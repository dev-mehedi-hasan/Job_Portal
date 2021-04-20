<?php

use Illuminate\Database\Seeder;
use App\Info;

class CreateInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	        $info = [
            [
	            'user_id' => '2',
	            'career_objective' => 'To seek employment as a Software Engineer where profound knowledge of HTML, CSS, Bootstrap, jQuery, AJAX, PHP, Laravel, MySQL, WordPress, and other similar systems, and ability to effectively design, maintain, and manage enterprise level CMS solutions will be applied',
	           	'work_experience' => '2.5',
	           	'current_position' => 'Web Developer',
	           	'current_company' => 'Smart Software Ltd.',
	        ],
        ];
  
        foreach ($info as $key => $value) {
            Info::create($value);
        }
    }
}
