<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser= User::query()->insert([
            ['role_id' => Role::query()->where('title' , 'admin')->first()->id,
                'mobile' => 'admin',
                'password' => bcrypt('123456'),
                 'identifier_code'=> '1234567',
            ],


        ]);
    }
}
