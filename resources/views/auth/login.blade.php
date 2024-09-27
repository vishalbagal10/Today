@extends('layouts.default')
@section('title', 'Login')

@section('content')
<style>
body {
    background: linear-gradient(to right, #6a11cb, #2575fc);
    margin: 0;
    height: 100vh;
    display: flex;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 20px;
}

.card-body {
    background: white;
    border-radius: 20px; 
    padding: 2.5rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3); 
    width: 400px; 
    display: flex;
    flex-direction: column; 
    justify-content: center; 
    transition: transform 0.3s;
}

.card-body:hover {
    transform: translateY(-5px);
}

.image-section {
    width: 50%; 
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden; 
}

.image-section img {
    width: 100%; 
    height: auto; 
    border-radius: 20px; 
    transition: transform 0.5s;
}

.image-section:hover img {
    transform: scale(1.1);
}

h2 {
    color: #6a11cb; 
    font-weight: bold; 
    margin-bottom: 20px;
}

.btn {
    background-color: #6a11cb; 
    color: white; 
    border: none; 
    padding: 12px 20px; 
    border-radius: 5px; 
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn:hover {
    background-color: #2575fc; 
    transform: scale(1.05);
}

.form-control {
    border-radius: 5px;
}

.form-control:focus {
    border-color: #2575fc;
    box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
}

.alert {
    border-radius: 5px; 
    margin-bottom: 15px;
}

.text-success {
    font-weight: bold;
}
</style>

<div class="container">
    <div class="card-body">
        <h2 class="text-center">Welcome Back!</h2>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        <form action="{{ route('check.login') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn w-100">Login</button>
            <div class="text-center mt-3">
                <span>Don't have an account? </span>
                <a href="{{ route('register') }}" class="text-decoration-none text-success">Register here</a>
            </div>
        </form>
    </div>

    <div class="image-section card-body">
        <img src="{{ asset('dist/img/bus.jpg') }}" alt="No Image Found">
    </div>
</div>

@endsection
