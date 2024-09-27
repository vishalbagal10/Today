<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locationmodel;
class Location extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locationmodel::create(['name' => 'Mumbai']);
        Locationmodel::create(['name' => 'Pune']);
        Locationmodel::create(['name' => 'Solapur']);
        Locationmodel::create(['name' => 'Latur']);
           
    }
}
