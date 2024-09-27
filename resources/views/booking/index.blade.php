@extends('layouts.main')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #6a11cb, #2575fc); 
        color: #fff; 
        font-family: 'Arial', sans-serif;
    }
    .container {
        background-color: rgba(255, 255, 255, 0.9); 
        border-radius: 15px; 
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); 
    }
    h1, h3 {
        color: #6a11cb; 
    }
    .form-control {
        border-radius: 5px; 
    }
    .btn-primary {
        background-color: #6a11cb; 
        border: none; 
        border-radius: 5px; 
        transition: background-color 0.3s ease; 
    }
    .btn-primary:hover {
        background-color: #2575fc; 
    }
    .table {
        background-color: #fff; 
        color: #000; 
    }
    .table thead th {
        background-color: #6a11cb; 
        color: white; 
    }
</style>

<div class="container p-5">
    <h1 class="text-center">Online Bus Booking System</h1>
    <form action="{{ route('select.seats') }}" method="post">
        @csrf
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="from">From</label>
                    <select class="form-control" id="from" name="from" required>
                        <option value="">Select City</option>
                        @foreach($locations as $value) 
                            <option value="{{ $value->name }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="to">To</label>
                    <select class="form-control" id="to" name="to" required>
                        <option>Select City</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="seat_type">Seat Type</label>
                    <select class="form-control" id="seat_type" name="seat_type" required>
                        <option value="">Select Seat</option>
                        <option value="Single">Single Seat</option>
                        <option value="Double">Double Seat</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="text-center">
            <input type="submit" class="btn btn-primary" name="Submit" value="Book">
        </div>
    </form>

    <div class="container mt-5">
        <h3 class="text-center">Booking Information</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Seat Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Seat No.</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($booking_data as $key => $value)
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <th>{{$value['customer_name']}}</th>
                        <td>{{$value['route']['start_location']}}</td>
                        <td>{{$value['route']['end_location']}}</td>
                        <td>{{$value['route']['seat_type']}}</td>
                        <td>Booked</td>
                        <td>{{$value['selected_seats']}}</td>
                        <td><a href="/booking_view/{{$value['id']}}" class="btn btn-primary btn-sm">View</a></td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#from').on('change', function(){
            $("#to").html('<option>Select City</option>');
            $.ajax({
                type: "POST",
                url: "{{ route('getLocation') }}",
                data: { _token: '{{ csrf_token() }}', from: $(this).val() },
                success: function(response) {
                    var result = JSON.parse(response);
                    result.forEach(function(location) {
                        $("#to").append('<option value="'+location.name+'">'+location.name+'</option>');
                    });
                }
            });
        });
    </script>
@endpush
