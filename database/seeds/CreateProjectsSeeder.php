<?php

use Illuminate\Database\Seeder;
use App\Project;

class CreateProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = [
            [
	            'user_id' => '2',
	            'project_title' => 'Pathology',
	           	'project_description' => 'It is a client Project',
	           	'project_link' => 'https://tinyurl.com/yac9rbm5',
	        ],
            [
	            'user_id' => '2',
	            'project_title' => 'Idea Tech Solution',
	           	'project_description' => 'It is a client Project',
	           	'project_link' => 'https://tinyurl.com/y9htom5m',
            ],
            [
	            'user_id' => '2',
	            'project_title' => 'Job Portal',
	           	'project_description' => 'It is a project for the educational purpose',
	           	'project_link' => '',
            ],
        ];
  
        foreach ($project as $key => $value) {
            Project::create($value);
        }
    }
}
