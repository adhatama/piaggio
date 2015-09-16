@extends('layouts.main')

@section('style-head')
    @parent

    <link href="{{ url('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ url('fullcalendar/fullcalendar.print.css') }}" rel="stylesheet" media='print'>

    <link href="{{ url('bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet">

@endsection

@section('header')
    <section id="home"></section>
    <div id="headerwrap-page">
        <div class="headerwrap-shadow-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <h3>Scooter Rental in Bandung</h3>
                        <h2>MEET BAGGIO!</h2>
                    </div>
                </div><! --/row -->
            </div> <!-- /container -->
        </div>
    </div><! --/headerwrap -->
@endsection

@section('content')
    <div class="container">
       <!--  <div class="row mt mb centered">
            <h1>Available Date</h1>

            <div class="margin-bottom-50"></div>

            <br>

            <div id="calendar"></div>
        </div> -->

        <div class="row mt">
            <p>Pick-up on {{ $pickupDateString }}</p>
            <p>Return on {{ $returnDateString }} ({{ $diffString }})</p>
            <p>Price: Rp{{ number_format($price) }} </p>
        </div>

        <div class="row mt mb">
            <div class="col-sm-6">
                <h3>Please Complete the Booking Form Below</h3>

                <div class="margin-bottom-50"></div>

                <form method="POST" action="{{ route('book.store') }}">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
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
                                <input type="checkbox" name="vespa" id="vespa-1" class="vespa-checkbox"> &nbsp
                                <h3 style="display: inline">Vespa PX-156</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="thumbnail">
                            <img src="{{ url('img/vespa1-1.jpg') }}" class="img-responsive vespa">
                            <div class="caption">
                                <input type="checkbox" name="vespa" id="vespa-2" class="vespa-checkbox"> &nbsp
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
@endsection

@section('script-end')
    @parent

    <script type="text/javascript" src="{{ url('fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('fullcalendar/fullcalendar.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datepicker').datepicker();


            $('#calendar').fullCalendar({
                header: {
                    right: 'prev,next today',
                    left: 'title'
                },
                eventClick: function(calEvent, jsEvent, view) {
                    alert('Event: ' + calEvent.title);
                },
                events: [
                    {
                        title: 'All Day Event',
                        start: '2015-09-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2015-09-07',
                        end: '2015-09-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2015-09-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2015-09-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2015-09-11',
                        end: '2015-09-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2015-09-12T10:30:00',
                        end: '2015-09-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2015-09-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2015-09-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2015-09-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2015-02-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2015-02-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2015-02-28'
                    }
                ]
            })

        });
    </script>
@endsection
