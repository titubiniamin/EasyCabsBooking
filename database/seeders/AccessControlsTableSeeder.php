<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class AccessControlsTableSeeder extends Seeder
{


    public function run()
    {

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $dev = \App\Models\Admin::where('email', 'dev@gmail.com')->first();

        if (empty($dev)) {

            $data = [
                [
                    'id' => '1',
                    'name' => 'Mohammad Naim',
                    'email' => 'naim@example.com',
                    'password' => bcrypt('123'),
                ],


            ];

            DB::table('admins')->insert($data);
        }




        // $count_permission = DB::table('permissions')->count();
        // $count_role = DB::table('roles')->count();

        // for ($i = 1; $i <= $count_role; $i++) {
        //     $data = [];
        //     for ($j = 1; $j <= $count_permission; $j++) {
        //         $data[$j]['permission_id'] = $j;
        //         $data[$j]['role_id'] = $i;
        //     }
        //     DB::table('role_has_permissions')->insert($data);
        //}
    }
}
