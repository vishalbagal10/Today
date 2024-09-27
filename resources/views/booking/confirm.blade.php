@extends('layouts.main')

@section('content')
<style>
    .container {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        margin-top: 50px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    h2 {
        text-align: center;
        color: #fff;
        background-color: #5a0bb3;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 30px;
        font-family: 'Arial', sans-serif;
        font-size: 28px;
    }

    h3 {
        color: #333;
        text-align: center;
        font-family: 'Arial', sans-serif;
        margin: 10px 0;
    }

    button {
        display: block;
        width: 100%;
        padding: 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        margin-top: 20px;
    }


    @media (max-width: 600px) {
        .container {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }

        button {
            font-size: 16px;
        }
    }
</style>

<div class="container">
    <h2>Confirm Your Booking</h2>
    <h3><b>From:</b> {{ $routeData['start_location'] }}</h3>
    <h3><b>To:</b> {{ $routeData['end_location'] }}</h3>
    <h3><b>Customer Name:</b> {{ $customerName }}</h3>
    <h3><b>Selected Seats:</b> {{ implode(', ', $selectedSeats) }}</h3>
    <h3><b>Total Price:</b> ₹{{ $totalPrice }}</h3>

    <form action="{{ route('booking.finalize') }}" method="POST">
        @csrf
        <input type="hidden" name="customer_name" value="{{ $customerName }}">
        <input type="hidden" name="selected_seats" value="{{ implode(',', $selectedSeats) }}">
        <button type="submit">Finalize Booking</button>
    </form>
</div>
@endsection
