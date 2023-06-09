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
            <a class="nav-link" href="{{ route('login') }}">Sign in</a>
            <a class="nav-link" href="{{ route('register') }}">Sign up</a>
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
                <a href="#home">Home</a>
            </li>
            <li>
                <!-- tady routa na nemovitost -->
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
      <div class="MainPage">Welcome</div>
      <img class="MainPage" src="{{ asset('img/house.jpg') }}" height="15%"  width="100%">
      
      
      <div class="MainPageText">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin in tellus sit amet nibh dignissim sagittis. Proin pede metus, vulputate nec, fermentum fringilla
        , vehicula vitae, justo. Et harum quidem rerum facilis est et expedita distinctio. Donec quis nibh at felis congue commodo. Nulla accumsan, elit sit amet varius semper, nulla mauris mol
        lis quam, tempor suscipit diam nulla vel leo. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Sed ac dolor sit amet purus malesuada congue. Etiam posuere lac
        us quis dolor. Aliquam erat volutpat. 
      </div>
      <div class="circle-container">
        {{-- Aparments --}}
        <div class="circle">
          <h3>apps</h3>
          <p>Bytů</p>
          <div class="sub-circles">
            <div class="sub-circle">
              <h4>dsa</h4>
              <p>K pronájmu</p>
            </div>
            <div class="sub-circle">
              <h4>dsa</h4>
              <p>Na prodej</p>
            </div>
          </div>
        </div>
        
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