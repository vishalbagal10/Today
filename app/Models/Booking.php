<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'user_email',
        'customer_name',
        'selected_seats',
        'total_price',
    ];

    /**
     * Define the relationship with the Route model.
     */
    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    


}
