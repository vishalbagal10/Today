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
        color: #dc3545; /* Red color for error */
        text-align: center;
    }
</style>

<div class="container">
    <h1>Booking Failed!</h1>
    <h3>There was an error processing your booking. Please try again later.</h3>
    <a href="{{ route('booking.select') }}" class="btn btn-danger">Back to Booking</a>
</div>
@endsection
