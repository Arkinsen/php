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
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1>Properties</h1>
            <a href="{{ route('property.create') }}" class="btn btn-primary mb-3">Add New Property</a>
            @if($properties->isEmpty())
            <p>No properties found for this user.</p>
            @else
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Rent/Sale</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($properties as $property)
                  <tr>
                    <td>{{ $property->description }}</td>
                    <td>
                      @switch($property->property_type)
                      @case(1) Apartment @break
                      @case(2) House @break
                      @case(3) Lot @break
                      @default Unknown
                      @endswitch
                    </td>
                    <td>{{ $property->rentsale ? 'Rent' : 'Sale' }}</td>
                    <td>{{ $property->size }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->street }}, {{ $property->city }}</td>
                    <td>
                      <a href="{{ route('property.edit', $property) }}" class="btn btn-success">Edit</a>
                      <form method="POST" action="{{ route('property.destroy', $property) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
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