<?php

use Illuminate\Database\Seeder;
use App\Application;

class CreateApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $application = [
            [
	            'applicant_id' => '2',
                'job_id' => '1',
                'status' => '0',
	        ],
        ];

        foreach ($application as $key => $value) {
            Application::create($value);
        }
    }
}
