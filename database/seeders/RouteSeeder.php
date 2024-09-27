<?php
// database/seeders/RouteSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    public function run()
    {
        Route::create(['start_location' => 'Mumbai', 'end_location' => 'Pune', 'price_single' => 500, 'price_double' => 300]);
        Route::create(['start_location' => 'Pune', 'end_location' => 'Solapur', 'price_single' => 700, 'price_double' => 400]);
        Route::create(['start_location' => 'Solapur', 'end_location' => 'Latur', 'price_single' => 800, 'price_double' => 500]);
        Route::create(['start_location' => 'Mumbai', 'end_location' => 'Latur', 'price_single' => 970, 'price_double' => 600]);
    }
}
