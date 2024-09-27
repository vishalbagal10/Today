<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $routes = Route::all();
        $locations = Location::all();
        $booking_data = Booking::with('route')
                        ->where('user_email', $request->session()->get('LoggedUserEmail'))
                        ->get()
                        ->toArray();
        
        return view('booking.index', compact('routes','locations','booking_data'));
    }


    public function selectSeats(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'seat_type' => 'required',
        ]);
    
        $from = $request->input('from');
        $to = $request->input('to');
        $seat_type = $request->input('seat_type');
    
        $route = Route::where('start_location', $from)
            ->where('end_location', $to)
            ->where('seat_type', $seat_type)
            ->first();
    
        if (!$route) {
            return redirect()->back()->with('error', 'Route not found.');
        }
    
        $seats = Seat::where('seat_type', $seat_type)->get();
    
        if ($seats->isEmpty()) {
            return redirect()->back()->with('error', 'No available seats found.');
        }
    
        $booking_data = Booking::where('route_id', $route->id)->pluck('selected_seats')->toArray();
        
        $seats_data = [];
        foreach ($booking_data as $seatList) {
            $seats_data = array_merge($seats_data, explode(',', $seatList));
        }
        $seats_data = array_map('trim', $seats_data); 
        $seats_data = array_unique($seats_data); 
    

        $routeData = $route->toArray();
    
        return view('booking.select_seat', compact('routeData', 'seats', 'seats_data'));
    }
    
    

    public function success()
    {
        return view('booking.success');
    }

    public function confirmBooking(Request $request)
    {
        // return $request->input(); 
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'selected_seats' => 'required|string', 
        ]);

        $customerName = $request->input('customer_name');
        $selectedSeats = explode(',', $request->input('selected_seats'));

        Seat::whereIn('seat_number', $selectedSeats)->update(['is_booked' => 1]);

        $routeData = Route::find($request->input('route_id'));
        // echo "<pre>";
        // print_r($routeData);die;
        $totalPrice = count($selectedSeats) * $routeData->price;
        Booking::create([
            'route_id' => $routeData->id,
            'user_email' => $request->session()->get('LoggedUserEmail'),
            'customer_name' => $customerName,
            'selected_seats' => implode(',', $selectedSeats),
            'total_price' => $totalPrice,
        ]);

        return view('booking.confirm', [
            'routeData' => $routeData,
            'customerName' => $customerName,
            'selectedSeats' => $selectedSeats,
            'totalPrice' => $totalPrice,
        ]);
    }
    
    public function finalizeBooking(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'selected_seats' => 'required|string',
        ]);

        $selectedSeats = explode(',', $request->input('selected_seats'));
        $customerName = $request->input('customer_name');

        foreach ($selectedSeats as $seatNumber) {
            Seat::where('seat_number', $seatNumber)->update(['is_booked' => true,]);
        }

        return redirect()->route('booking.success');
    }

    public function getLocation(Request $request)
    {
        if($request->ajax()){
            $from_location = $request->input('from');
            $locations = DB::table('locations')->where('name','!=', $from_location)->get();
            return json_encode($locations);
        };
    }

    public function booking_view(Request $request, $id)
    {
        
        $booking_data = Booking::with('route')->where('id', $id)->get()->toArray();

        $seats_data = [];

        if(!empty($booking_data)){
            $seats_data = explode(",",$booking_data[0]['selected_seats']);
        }

        $seats = Seat::where('seat_type', $booking_data[0]['route']['seat_type'])->get();
        
        return view('booking.booking_view', [
            'seats' => $seats,
            'booking_data' => $booking_data,
            'seats_data' => $seats_data,
        ]);
        // return view('booking.booking_view');
    }

}

