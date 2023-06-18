<!DOCTYPE html>
<html>
<!-- content -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Reality Check</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <!-- Reality Check Logo -->
      <a class="navbar-brand" href="{{ url('/') }}">Reality Check</a>

      <!-- Navbar toggler button for smaller screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @if (Route::has('login'))
          @auth
          <!-- Links for authenticated users -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">Edit Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
          @else
          <!-- Links for guests -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Sign in</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Sign up</a>
          </li>
          @endif
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Reality Check</h3>
      </div>

      <ul class="list-unstyled components">
        {{-- <p>Dummy Heading</p> --}}
        <li>
          <a href="{{ url('/') }}">Home</a>
        </li>
        <li>
          <a href="{{ url('/properties') }}">View Properties</a>

        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
      <div class="MainPage">Welcome</div>
      <img class="MainPage" src="{{ asset('img/house.jpg') }}" height="15%" width="100%">


      <div class="MainPageText">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin in tellus sit amet nibh dignissim sagittis. Proin pede metus, vulputate nec, fermentum fringilla
        , vehicula vitae, justo. Et harum quidem rerum facilis est et expedita distinctio. Donec quis nibh at felis congue commodo. Nulla accumsan, elit sit amet varius semper, nulla mauris mol
        lis quam, tempor suscipit diam nulla vel leo. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Sed ac dolor sit amet purus malesuada congue. Etiam posuere lac
        us quis dolor. Aliquam erat volutpat.
      </div>

      <div class="circle-container">
        <!-- Apartment -->
        <div class="circle">
          <h3>{{ $numberOfApartments }}</h3>
          <p>Apartments</p>
          <div class="sub-circles">
            <div class="sub-circle">
              <h4>{{ $numberOfApartmentsForRent }}</h4>
              <p>For Rent</p>
            </div>
            <div class="sub-circle">
              <h4>{{ $numberOfApartmentsForSale }}</h4>
              <p>For Sale</p>
            </div>
          </div>
        </div>

        <!-- House -->
        <div class="circle">
          <h3>{{ $numberOfHouses }}</h3>
          <p>Houses</p>
          <div class="sub-circles">
            <div class="sub-circle">
              <h4>{{ $numberOfHousesForRent }}</h4>
              <p>For Rent</p>
            </div>
            <div class="sub-circle">
              <h4>{{ $numberOfHousesForSale }}</h4>
              <p>For Sale</p>
            </div>
          </div>
        </div>

        <!-- Lots -->
        <div class="circle">
          <h3>{{ $numberOfLots }}</h3>
          <p>Lots</p>
          <div class="sub-circles">
            <div class="sub-circle">
              <h4>{{ $numberOfLotsForRent }}</h4>
              <p>For Rent</p>
            </div>
            <div class="sub-circle">
              <h4>{{ $numberOfLotsForSale }}</h4>
              <p>For Sale</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

<footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</footer>

</html>