<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Baggio!</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('css/style-v2.css') }}" rel="stylesheet">
    <link href="{{ url('fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>

    <link href='https://fonts.googleapis.com/css?family=Spinnaker' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    @yield('style-head')

    @yield('script-head')
</head>

<body>
<!-- Static navbar -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home') }}" id="home-button">Home</a></li>
                <li><a href="#" id="contact-button">Contact Us</a></li>
                <li><a href="#" id="pricelist-button">Price List</a></li>
                <li><a href="terms.html#terms" id="term-button">Terms of Service</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

@yield('header')

@yield('content')

<div id="footerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-4">
                <p><b>HEAD OFFICE</b></p>
                <p>Jl. Parakan Waas 2 no. 30, Batununggal, Buah Batu, Bandung</p>
            </div>

            <div class="col-lg-4">
                <p><b>CONTACT</b></p>
                <p>0856 1234 5678</p>
                <p>hello@baggio.com</p>
            </div>
            <div class="col-lg-4">
                <p><b>SOCIAL</b></p>
                <p><i class="fa fa-twitter"></i> @baggio</p>
                <p><i class="fa fa-instagram"></i> &nbsp baggio</p>
            </div>
        </div>
    </div>
</div><! --/footerwrap -->

@yield('script-end')

</body>
</html>