<!DOCTYPE html>
<html>
<!-- content -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Reality Check</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>



    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid ms-auto">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" n:href="Login:login">Sign in</a>
                    <a class="nav-link" n:href="Login:register">Sign up</a>
                </div>
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
            <div class="MainPage">Welcome</div>
            <img class="MainPage" src="{{ asset('img/house.jpg') }}" height="15%" width="100%">

            <button class="btn btn-primary"></button>
        </div>
    </div>
    </div>
</body>



<!-- CSS only -->


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</html>