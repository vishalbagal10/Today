@extends('layouts.main')

@section('content')

<div class="container">
    <form action="" method="post">
        @csrf
        <div>
          <label for="fullname" class="col-form-label">Full Name: <span class="text-asterisk">*</span></label>
          <div class="input-group mb-3">
              <input type="text" class="form_control_inner" name="fullname" id="fullname" value="{{ $userData->name }}" placeholder="Name">
              <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
          </div>
        </div>

        <div>
          <label for="email" class="col-form-label">Email:</label>
          <div class="input-group mb-3">
              <input type="text" class="form_control_inner" name="email" id="email" value="{{ $userData->email }}" placeholder="Email" readonly>
              <span class="text-danger">@error('email') {{ $message }} @enderror</span>
          </div>
        </div>

        <div>
          <label for="password" class="col-form-label">Password: <span class="text-asterisk">*</span></label>
          <div class="input-group mb-3">
              <input type="password" class="form_control_inner" name="password" id="password" value="{{ $userData->password }}">
              <span class="text-danger">@error('password') {{ $message }} @enderror</span>
          </div>
        </div>
        </div>

        <div class="row">
          <div class="col-6">
            {{-- <button type="submit" class="btn btn-primary">Back to Main Page</button> --}}
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
      </form>
      <a href="{{ route('booking.index') }}" class="btn btn-primary">Back to Main Page</a>
</div>

@endsection
