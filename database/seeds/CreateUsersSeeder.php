<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@itsolutionstuff.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
               'phone_number' => '01792095970',
               'date_of_birth' => '2020-08-12',
               'address' => 'Dhanmondi-Dhaka',
               'pic' => '/../Job_Portal/public/image/user/admin.jpg',
            ],
            [
               'name'=>'User',
               'email'=>'user@itsolutionstuff.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
               'phone_number' => '01689857471',
               'date_of_birth' => '1996-08-12',
               'address' => '#58/D,#West Raja bazar,#Tejgaon-1215-Dhaka',
               'pic' => '/../Job_Portal/public/image/user/anik.jpg',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
