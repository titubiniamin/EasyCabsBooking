<?php

namespace Database\Seeders;

use App\Models\Admin\Rider;
use Illuminate\Database\Seeder;
use Database\Factories\Admin\RiderFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(AccessControlsTableSeeder::class);


    }
}
