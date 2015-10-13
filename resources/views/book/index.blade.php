@extends('layouts.main-v2')

@section('style-head')
    @parent

    <link href="{{ url('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ url('fullcalendar/fullcalendar.print.css') }}" rel="stylesheet" media='print'>

    <link href="{{ url('bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet">

    <style>
        .map-container{
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* Ratio 16:9 ( 100%/16*9 = 56.25% ) */
        }
        #map {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection

@section('script-head')
    <script type="text/javascript">
        function initMap() {
            var bandung = new google.maps.LatLng(-6.918020, 107.620584);

            var map = new google.maps.Map(document.getElementById('map'), {
                center: bandung,
                zoom: 15,
                scrollwheel: false
            });

            var marker = new google.maps.Marker({
                position: bandung,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
//                console.log(marker.getPosition().M);
//                console.log( 'Lat: ' + event.latLng.lat() + ' and Longitude is: ' + event.latLng.lng() );
                $('input[name="latitude"]').val(marker.getPosition().J);
                $('input[name="longitude"]').val(marker.getPosition().M);
            });

            google.maps.event.addListenerOnce(map, 'idle', function(){
                google.maps.event.trigger(marker, 'dragend');
            });
        }

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>
@endsection

@section('header')
    @include('layouts.header-v2')
@endsection

@section('content')
    <div class="container" style="width: 100%; height: 100%">
        <div class="row mt">
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            <p class="text-center">Pick-up on {{ $pickupDateString }}</p>
            <p class="text-center">Return on {{ $returnDateString }} ({{ $diffString }})</p>
            <p class="text-center">Price: Rp{{ number_format($price) }} </p>
        </div>

        <div class="row mt mb">
            <div class="map-container">
                <div id="map"></div>
            </div>
        </div>

        <div class="row mt mb" style="padding: 50px">
            <div class="col-sm-6">
                <h3>Please Complete the Booking Form Below</h3>

                <div class="margin-bottom-50"></div>

                <form method="POST" action="{{ route('book.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="pickupDate" value="{{ $pickupDate }}">
                    <input type="hidden" name="returnDate" value="{{ $returnDate }}">
                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                    <input type="hidden" name="latitude">
                    <input type="hidden" name="longitude">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name"
                                   name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="phone">Phone *</label>
                            <input type="text" class="form-control" id="phone"
                                   name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="email">Email *</label>
                            <input type="text" class="form-control" id="email"
                                   name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment"
                                   name="comment">{{ old('comment') }}</textarea>
                        </div>
                    </div>

                    <div class="margin-bottom-50"></div>

                <!-- </form> form close dipindahkan dibawah supaya input checkbox vespa bisa masuk-->
            </div>

            <div class="col-sm-6 vespa-checkbox-form">
                <h3>Available Unit. Make Your Choice</h3>

                <div class="row">
                    <label for="vespa-1"></label>
                    <div class="col-sm-6">
                        <div class="thumbnail">
                            <img src="{{ url('img/vespa1-1.jpg') }}" class="img-responsive vespa">
                            <div class="caption">
                                <input type="checkbox" name="vespa[]" value="1" id="vespa-1" class="vespa-checkbox"> &nbsp
                                <h3 style="display: inline">Vespa PX-156</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="thumbnail">
                            <img src="{{ url('img/vespa1-1.jpg') }}" class="img-responsive vespa">
                            <div class="caption">
                                <input type="checkbox" name="vespa[]" value="2" id="vespa-2" class="vespa-checkbox"> &nbsp
                                <h3 style="display: inline">Vespa PX-156</h3>
                            </div>
                        </div>
                    </div>
                    <label for="vespa-2"></label>
                </div>
            </div>

            <div class="clearfix"></div>
            <br>

            <div class="col-sm-12">
                <button type="submit" class="form-control btn btn-danger">Confirm Reservation</button>
            </div>

            </form>
        </div>
    </div>

    <div class="clearfix"></div>
    <div style="margin-bottom: 50px"></div>
@endsection

@section('script-end')
    @parent

    <script type="text/javascript" src="{{ url('fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('fullcalendar/fullcalendar.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection
