<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'hub_id' => 1,
            'name' => "Bini Amin",
            'email' => 'titubiniamin@gmail.com',
            'password' => Hash::make(123),
            'isActive' => 1,
            'collection' => 0
        ]);
    }
}
