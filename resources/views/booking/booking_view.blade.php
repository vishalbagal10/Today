@extends('layouts.main')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: #333;
        font-family: 'Arial', sans-serif;
        padding: 20px;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        margin-top: 50px;
    }

    h1, h3 {
        color: #6a11cb;
        text-align: center;
    } 

    .seat {
        display: inline-block;
        border: 2px solid #6a11cb;
        padding: 15px;
        margin: 10px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
        font-weight: bold;
        width: 50px;
        text-align: center;
        position: relative;
    }

    .seat:hover {
        transform: scale(1.1);
    }

    .disabled {
        border-color: gray;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .green {
        background-color: green;
        color: white;
    }

    .white {
        background-color: white;
        color: #6a11cb;
    }

    button {
        background-color: #6a11cb;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        margin-top: 20px;
    }

    button:hover {
        background-color: #2575fc;
    }

    .seat-label {
        position: absolute;
        bottom: 5px; 
        left: 50%;
        transform: translateX(-50%);
        font-size: 14px; 
        color: #fff; 
    }
</style>

<div class="container">
    <h1>Selected Seat for {{ $booking_data[0]['route']['start_location'] }} to {{ $booking_data[0]['route']['end_location'] }}</h1>
    <form action="{{ route('booking.confirm') }}" method="POST" id="bookingForm">
        @csrf
        <div class="price-list">
            <h3>Prices</h3>
            <ul>
                <li>{{ $booking_data[0]['route']['seat_type'] }} Seat Price: ₹{{ $booking_data[0]['total_price'] }}</li>
            </ul>
        </div>

        <div class="form-group">
            <label for="customer_name"><h3>Enter Customer's Name:</h3></label>
            <input type="text" name="customer_name" placeholder="Customer Name" value="{{ $booking_data[0]['customer_name']}}" class="form-control" disabled>
        </div>

    

        <div>
            <h3>Your Selected Seats</h3>
            <div class="row" id="single_row">
                <ul style="padding: 0; display: flex; justify-content: center; flex-wrap: wrap;">
                    @foreach($seats as $seat)
                        @php
                        $disabled = 'white';
                            if(in_array($seat->seat_number, $seats_data)){
                                $disabled = 'disabled';
                            }
                        @endphp
                        <li class="seat {{ $disabled }}" data-seat-number="{{ $seat->seat_number }}">
                            <span class="seat-label" style="color:black;">{{ $seat->seat_number }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endsection
