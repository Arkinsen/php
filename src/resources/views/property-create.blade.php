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
            <div class="container">
                <h1 class="my-4">Edit Property</h1>

                <form action="{{ route('property.store') }}" method="POST">
                    <!-- to check if user who is making changes is actually authenticated  -->
                    @csrf

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" maxlength="40">
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="longDescription">Long Description:</label>
                        <textarea id="longDescription" name="longDescription" class="form-control" maxlength="255">{{ old('longDescription')}}</textarea>
                        @error('longDescription')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="property_type">Property Type:</label>
                        <select id="property_type" name="property_type" class="form-control">
                            <option value="1">Apartment</option>
                            <option value="2">House</option>
                            <option value="3">Lot</option>
                        </select>
                        @error('property_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rentsale">For Rent/Sale:</label>
                        <select id="rentsale" name="rentsale" class="form-control">
                            <option value="1">Rent</option>
                            <option value="2">Sale</option>
                        </select>
                        @error('rentsale')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="size">Size:</label>
                        <input id="size" type="text" name="size" class="form-control" value="{{ old('size') }}">
                        @error('size')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input id="price" type="text" name="price" class="form-control" value="{{ old('price') }}">
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="street">Street:</label>
                        <input id="street" type="text" name="street" class="form-control" value="{{ old('street') }}" maxlength="255">
                        @error('street')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <input id="city" type="text" name="city" class="form-control" value="{{ old('city') }}" maxlength="255">
                        @error('city')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary" style="margin-bottom: 50px;">Add Property</button>

                </form>
            </div>

        </div>
    </div>
</body>

<footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</footer>

</html>