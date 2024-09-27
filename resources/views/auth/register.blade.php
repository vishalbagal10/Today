@extends('layouts.default')
@section('title', 'Registration')
@section('content')

<style>
body {
    background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradient background */
    font-family: 'Arial', sans-serif;
}

.container {
    display: flex;
    align-items: center;
    min-height: 100vh; /* Full viewport height */
    justify-content: center;
}

.card {
    width: 400px; /* Wider card */
    border-radius: 20px; /* Rounded corners */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Shadow for depth */
}

.card-header {
    background-color: #6a11cb; /* Attractive header color */
    color: white;
    border-top-left-radius: 20px; /* Match the card's corners */
    border-top-right-radius: 20px; /* Match the card's corners */
    text-align: center; /* Centered text */
}

.btn {
    background-color: #6a11cb; /* Button color */
    color: white; /* Text color */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded button */
    padding: 10px 15px; /* Padding for better touch target */
    width: 100%; /* Full width */
    transition: background-color 0.3s ease; /* Smooth transition */
}

.btn:hover {
    background-color: #2575fc; /* Change color on hover */
}

.form-control {
    border-radius: 5px; /* Rounded corners for inputs */
}

.form-control:focus {
    border-color: #2575fc; /* Focus color */
    box-shadow: 0 0 5px rgba(37, 117, 252, 0.5); /* Focus shadow */
}

.alert {
    border-radius: 5px; /* Rounded corners for alerts */
    margin-top: 1rem; /* Space between alerts and form */
}
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Sign Up</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        <div class="card-body">
            <form action="{{ route('register.save') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="useremail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="mb-3">
                    <label for="userpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter Your Password" required>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="password_confirmation" placeholder="Confirm Your Password" required>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="text-center mt-3">
                    <span>Already have an account? </span>
                    <a href="/" class="text-decoration-none text-primary">Login here</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
