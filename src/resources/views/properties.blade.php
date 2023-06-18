<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Reality Check</title>
  <!-- Latest compiled and minified CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/propertyList.css') }}">

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
          <!-- tady routa na nemovitost -->
        </li>
        <li>
          <a href="{{ url('/homePage') }}">Test</a>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
      <div class="filter">
        <h4>Filters:</h4>


        <form action="{{ route('propertiesList.index') }}" method="GET">
          <div class="form-group">
            <label for="sort">Sort by:</label>
            <select name="sort" id="sort">
              <option value="">--Select--</option>
              <!-- Request is for values being stored in filter dropdown -->
              <option value="price_asc" {{ request()->sort == 'price_asc' ? 'selected' : '' }}>Price low to high</option>
              <option value="price_desc" {{ request()->sort == 'price_desc' ? 'selected' : '' }}>Price high to low</option>
              <option value="size_asc" {{ request()->sort == 'size_asc' ? 'selected' : '' }}>Size low to high</option>
              <option value="size_desc" {{ request()->sort == 'size_desc' ? 'selected' : '' }}>Size high to low</option>
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status">
              <option value="">--Select--</option>
              <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>For Rent</option>
              <option value="2" {{ request()->status == '2' ? 'selected' : '' }}>For Sale</option>
            </select>
          </div>

          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" value="{{ request('city') }}">
          </div>

          <!-- Check if Status is also picked if you try to sort -->
          @if ($errors->has('status'))
          <div class="alert alert-danger">
            {{ $errors->first('status') }}
          </div>
          @endif

          <div class="form-group">
            <button type="submit">Apply</button>
            <a href="{{ route('propertiesList.index') }}" class="button">Reset</a>
          </div>
        </form>
      </div>

      <div class="MainPageText">Properties</div>

      @foreach ($properties as $property)
      <div class="property-container">
        <h3>{{ $property->description }}</h3>
        <hr>
        <p>
          @if ($property->rentsale == 1)
        <h5 style="background-color:lightgreen;">For Rent</h5>
        <p>Price: {{ $property->price }} €/month</p>
        @elseif ($property->rentsale == 2)
        <h5 style="background-color:lightcoral;">For Sale</h5>
        <p>Price: {{ $property->price }} €</p>
        @endif
        </p>

        <p>Size: {{ $property->size }}</p>

        <!-- Display the city and street of the property in one line -->
        <p>{{ $property->city }}, {{ $property->street }}</p>

        @if($property->images->where('is_main', true)->first())
        <div class="image-wrapper">
          <img src="{{ $property->images->where('is_main', true)->first()->imagepath }}" alt="Property Image">
        </div>
        @endif

        <a href="{{ route('properties.show', $property->id) }}" class="moreInfoButton">View More</a>

      </div>
      @endforeach

      <!-- Render pagination links and keeps the parametrs in URL so filter applies for every page-->
      {{ $properties->appends(request()->input())->links() }}


    </div>
  </div>
  </div>
</body>

<footer>
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</footer>

</html>