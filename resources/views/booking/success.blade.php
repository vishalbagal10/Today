@extends('layouts.main')

@section('content')
<style>
    .container {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        margin-top: 50px;
    }
    h1, h3 {
        color: #28a745; /* Green color for success */
        text-align: center;
    }
</style>

<div class="container">
    <h1>Booking Successful!</h1>
    <h3>Your seats have been successfully booked.</h3>
    <h3>Thank you for choosing us!</h3>
    <a href="{{ route('booking.index') }}" class="btn btn-primary">Return to Home</a>
</div>
@endsection
