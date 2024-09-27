<?php
// database/seeders/SeatSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Route;

class SeatSeeder extends Seeder
{
    public function run()
    {
        $routes = Route::all();

        foreach ($routes as $route) {
            for ($i = 1; $i <= 5; $i++) {
                Seat::create([
                    'route_id' => $route->id,
                    'seat_number' => 'S' . $i,
                    'seat_type' => 'Single',
                    'is_booked' => false
                ]);
            }

            for ($i = 1; $i <= 5; $i++) {
                Seat::create([
                    'route_id' => $route->id,
                    'seat_number' => 'D' . $i,
                    'seat_type' => 'Double',
                    'is_booked' => false
                ]);
            }
        }
    }
}

