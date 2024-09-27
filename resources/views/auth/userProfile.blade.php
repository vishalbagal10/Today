<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <form action="" method="post">
            @csrf
            <div>
              <label for="fullname" class="col-form-label">Full Name: <span class="text-asterisk">*</span></label>
              <div class="input-group mb-3">
                  <input type="text" class="form_control_inner" name="fullname" id="fullname" value="{{ $clientData->name }}" placeholder="Name">
                  <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
              </div>
            </div>

            <div>
              <label for="email" class="col-form-label">Email:</label>
              <div class="input-group mb-3">
                  <input type="text" class="form_control_inner" name="email" id="email" value="{{ $clientData->email }}" placeholder="Email" readonly>
                  <span class="text-danger">@error('email') {{ $message }} @enderror</span>
              </div>
            </div>

            <div>
              <label for="password" class="col-form-label">Password: <span class="text-asterisk">*</span></label>
              <div class="input-group mb-3">
                  <input type="password" class="form_control_inner" name="password" id="password" value="{{ $clientData->password }}">
                  <span class="text-danger">@error('password') {{ $message }} @enderror</span>
              </div>
            </div>
            </div>

            <div class="clearfix">&nbsp;</div>
          </form>
          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{route('exit')}}" class="btn btn-primary">LogOut</a>
            </div>
          </div>
    </div>
</body>
</html>
