<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\AdminUserModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        AdminUserSeeder::class,

        ]);
    }
}
