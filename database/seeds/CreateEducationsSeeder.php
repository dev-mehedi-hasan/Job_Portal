<?php

use Illuminate\Database\Seeder;
use App\Education;

class CreateEducationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	      $education = [
            [
	            'user_id' => '2',
	            'degree' => 'SSC/Equivalent',
	           	'institute' => 'Ghatail Gano Pilot High School',
	           	'subject' => 'Science',
	            'passing_year' => '2011',
	            'GPA' => '5.00',
            ],
            [
	            'user_id' => '2',
	            'degree' => 'HSC/Equivalent',
	           	'institute' => 'Ghatail Cant Public School and College',
	           	'subject' => 'Science',
	            'passing_year' => '2013',
	            'GPA' => '5.00',
            ],
            [
	            'user_id' => '2',
	            'degree' => 'B.Sc./Honours',
	           	'institute' => 'Daffodil International University',
	           	'subject' => 'Software Engineering',
	            'passing_year' => '2019',
	            'GPA' => '3.20',
            ],
        ];

        foreach ($education as $key => $value) {
            Education::create($value);
        }

    }
}
