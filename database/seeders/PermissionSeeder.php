<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->insert([
           [
               'title' => 'view-admin-dashboard' ,
               'label' => 'مشاهده داشبورد ادمین'
           ],
            [
                'title' => 'view-support-dashboard' ,
                'label' => 'مشاهده داشبورد پشتیبان ها'
            ],
        ]);
    }
}
