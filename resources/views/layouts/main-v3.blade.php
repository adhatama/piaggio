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

    <link href="{{ url('css/bootstrap-modal.css') }}" rel="stylesheet">
    <link href="{{ url('semantic-ui/semantic.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet">

    <link href="{{ url('css/style-v3.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('semantic-ui/semantic.min.js') }}"></script>

    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,700|Montserrat:400,700' rel='stylesheet' type='text/css'>

    @yield('style-head')

    @yield('script-head')
</head>

<body>
<div class="ui large menu">
    <div class="header item">
        <img src="{{ url('img/logo_baggio_light.png') }}" class="ui small image" style="margin-left: 50px">
    </div>
    <span class="toggle-menu">
    	<span class="bar"></span>
    	<span class="bar"></span>
    	<span class="bar"></span>
    </span>
	<div class="menu-overlay"></div>
    <ul class="right menu right-menu">
		<li class="visible-xs"><h3>Menu <span class="close-menu ui red">x</span></h3></li>

        <li class="item">
            <a href="#">Home</a>
        </li>
        <li class="item">
            <a href="#">About</a>
        </li>
        <li class="item">
            <a href="#">Price List</a>
        </li>
        <li class="item">
            <a href="#">Contact</a>
        </li>
    </ul>
</div>

@yield('content')

<div class="ui vertical center aligned footer segment form-page hidden-xs">
    <div class="ui container">
        Baggio Rent <?php echo date('Y'); ?>. All Rights Reserved
    </div>
</div>

<script src="{{ url('datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ url('js/carousel.js') }}"></script>
<script src="{{ url('js/modal.js') }}"></script>
<script src="{{ url('js/tab.js') }}"></script>
<script src="{{ url('js/transition.js') }}"></script>

@yield('script-end')

    <script type="text/javascript">
    	jQuery(document).ready(function($) {
    		$('.toggle-menu').click(function(event) {
    			$('.menu-overlay').addClass('open');
    			$('.right-menu').addClass('open');
    		});
    		$('.menu-overlay,.close-menu').click(function(event) {
    			$('.menu-overlay').removeClass('open');
    			$('.right-menu').removeClass('open');
    		});
    		$('.order-toggle').click(function(event) {
    			$('.order-review').toggleClass('open');
    		});
    		$('.order-toggle').appendTo('.ui.large.menu');
    		$('select').dropdown();
    		$('.upward').dropdown({
    			direction: 'upward'
    		});
    	});
    </script>

</body>
</html>