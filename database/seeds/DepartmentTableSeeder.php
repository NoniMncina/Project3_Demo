<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept1 = new Department();
        $dept1->dptName = 'Information Technology';
        $dept1->save();

        $dept2 = new Department();
        $dept2->dptName = 'Psychology';
        $dept2->save();

        $dept3 = new Department();
        $dept3->dptName = 'Theology';
        $dept3->save();

        $dept3 = new Department();
        $dept3->dptName = 'Agriculture';
        $dept3->save();

    }
}     