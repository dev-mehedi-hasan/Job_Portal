<?php

use Illuminate\Database\Seeder;
use App\Job;
class CreateJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = [
            [
	            'user_id' => '1',
	            'office_name' => 'Smart Tech Solution',
	           	'position' => 'Web Developer',
	           	'description' => 'Senectus non fames aenean montes fringilla. Ipsum phasellus sagittis porttitor quam malesuada montes molestie sollicitudin eleifend dis diam dapibus aenean suspendisse elit pretium, varius pharetra natoque penatibus aptent. Proin neque.',
                'vacancy' => '5',
                'responsibilities' => 'Senectus non fames aenean montes fringilla. Ipsum phasellus sagittis porttitor quam malesuada montes molestie sollicitudin eleifend dis diam dapibus aenean suspendisse elit pretium, varius pharetra natoque penatibus aptent. Proin neque.
                                            Mate dropped a clanger cuppa I chinwag one plastered cheesed.
                                            Mate dropped a clanger cuppa I chinwag one plastered.
                                            Dropped a clanger cuppa I chinwag one plastered chee
                                            Cuppa I chinwag one plastered cheesed.',
                'skill_name' => 'PHP,Python',
                'employment_status' => 'Full Time',
	           	'required_education' => 'B.Sc./Honours',
	           	'salary' => '25000',
	           	'other_benifits' => 'Mate dropped a clanger cuppa I chinwag one plastered cheesed.
                                            Mate dropped a clanger cuppa I chinwag one plastered.
                                            Dropped a clanger cuppa I chinwag one plastered chee
                                            Cuppa I chinwag one plastered cheesed.',
                'location' => '58/1,D-block,Baridhara,Dhaka',
                'dead_line' => '2020-09-30',
	        ],
        ];

        foreach ($job as $key => $value) {
            Job::create($value);
        }
    }
}
