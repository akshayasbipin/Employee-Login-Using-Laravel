<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userObj = new User();
        $userObj->uname = 'UserAbc';
        $userObj->email = 'userAbc@gmail.com';
        $userObj->password = Hash::make('123456789');
        $userObj->type = 0;
        $userObj->sal = 100000;
        $userObj->save();

        $adminObj = new User();
        $adminObj->uname = 'AdminAbc';
        $adminObj->email = 'adminAbc@gmail.com';
        $adminObj->password = Hash::make('123456789');
        $adminObj->type = 1;
        $adminObj->sal = 200000; // Corrected assignment
        $adminObj->save();

        $superAdminObj = new User();
        $superAdminObj->uname = 'Super Admin Abc';
        $superAdminObj->email = 'superAdminAbc@gmail.com';
        $superAdminObj->password = Hash::make('123456789');
        $superAdminObj->type = 2;
        $superAdminObj->sal = 300000; // Corrected assignment
        $superAdminObj->save();
    }
}
