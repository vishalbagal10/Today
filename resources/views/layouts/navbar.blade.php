<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgb(162, 207, 248)">
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <img src="{{ asset('dist/img/bus2.jfif') }}" alt="" style="width: 50px; height:50px; border-radius:50%; color:black;"><h1>Yatra</h1>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user user-menu">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
          <img src="{{ asset('dist/img/avatar5.png') }}" class="user-image img-circle elevation-2" alt="User Image" style="border-radius:50%; width:50px; height:50px;">
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-menu-nav-cust">
          <li class="user-header bg-primary">
            <a href="{{ route('booking.index') }}" class="dropdown-item"><i class="fas fa-user mr-2"></i> Home</a>
          </li>
          <li class="user-header bg-primary">
            <a href="{{ route('profile') }}" class="dropdown-item"><i class="fas fa-user mr-2"></i> Profile</a>
          </li>
          <li class="user-footer">
            <a href="{{route('exit')}}" class="dropdown-item text-center">Logout</a>
          </li>
        </ul>
      </li>
    </ul>
</nav>
