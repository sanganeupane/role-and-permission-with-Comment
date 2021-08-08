<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\AdminUserModel;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AdminUser::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin002'),
            'image'=>'',
            'status'=>1,
//            'admin_type'=>'admin',
            'role'=>'super-admin'

        ]);
    }
}
