<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = new User();
        $root->name = 'Thando';
        $root->email = 'thando@gmail.com';
        $root->password = 'thando123';
        $root->status = true;
        $root->save();

        $admin = new User();
        $admin->name = 'Nikkie';
        $admin->email = 'nikkie@gmail.com';
        $admin->password = 'nikkie123';
        $admin->department_id = '1';
        $admin->status = true;
        $admin->save();

        $user = new User();
        $user->name = 'Noni';
        $user->email = 'noni@gmail.com';
        $user->password = 'noni123';
        $user->department_id = '2';
        $user->status = true;
        $user->save();
    }
}
