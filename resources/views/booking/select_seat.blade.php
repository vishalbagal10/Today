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

    h2{
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
        background-color: #2575fc;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        margin-top: 20px;
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
    <h2>Select Your Seat for {{ $routeData['start_location'] }} to {{ $routeData['end_location'] }}</h2>
    <form action="{{ route('booking.confirm') }}" method="POST" id="bookingForm">
        @csrf
        <div class="price-list">
            <h3>Prices</h3>
            <ul>
                <li>{{ $routeData['seat_type'] }} Seat Price: ₹{{ $routeData['price'] }}</li>
            </ul>
        </div>

        <div class="form-group">
            <label for="customer_name"><h3>Enter Customer's Name:</h3></label>
            <input type="text" name="customer_name" placeholder="Customer Name" required class="form-control">
        </div>

        <input type="hidden" name="selected_seats" id="selected_seats" value="">
        <input type="hidden" name="route_id" value="{{ $routeData['id'] }}">

        <div>
            <h3>Select Your Seats</h3>
            <div class="row" id="single_row">
                <ul style="padding: 0; display: flex; justify-content: center; flex-wrap: wrap;">

                    @foreach($seats as $seat)
                        @php
                            $disabled = in_array($seat->seat_number, $seats_data) ? 'disabled' : 'white';
                        @endphp
                        <li class="seat {{ $disabled }}" data-seat-number="{{ $seat->seat_number }}">
                            <span class="seat-label" style="color:black;">{{ $seat->seat_number }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <button type="submit">Confirm Booking</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const selectedSeats = [];

        $('.seat').on('click', function() {
            if (!$(this).hasClass('disabled')) {
                const seatNumber = $(this).data('seat-number');

                $(this).toggleClass('green white');

                if (selectedSeats.includes(seatNumber)) {
                    selectedSeats.splice(selectedSeats.indexOf(seatNumber), 1);
                } else {
                    selectedSeats.push(seatNumber);
                }

                $('#selected_seats').val(selectedSeats.join(','));
            }
        });
    });
</script>

@endsection
