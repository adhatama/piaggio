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

    <link href="{{ url('semantic-ui/semantic.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('css/style-v3.css') }}" rel="stylesheet">
    <link href="{{ url('fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('semantic-ui/semantic.min.js') }}"></script>

    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

    @yield('style-head')

    @yield('script-head')
</head>

<body>

<div class="ui large menu">
    <div class="header item">
        <img src="{{ url('img/logo_baggio_light.png') }}" class="ui small image" style="margin-left: 50px">
    </div>
    <div class="right menu">
        <a class="item">
            Home
        </a>
        <a class="item">
            About
        </a>
        <a class="item">
            Price List
        </a>
        <a class="item">
            Contact
        </a>
    </div>
</div>

@yield('content')

<div class="ui vertical center aligned footer segment form-page">
    <div class="ui container">
        Baggio Rent 2015. All Rights Reserved
    </div>
</div>

@yield('script-end')

</body>
</html>