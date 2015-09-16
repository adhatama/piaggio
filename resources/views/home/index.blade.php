@extends('layouts.main')

@section('style-head')
    @parent

    <link href="{{ url('bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet">
@endsection

@section('header')
    <section id="home"></section>
    <div id="headerwrap">
        <div class="headerwrap-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div style="margin-top: 90px"></div>
                        <h3>Scooter Rental in Bandung</h3>
                        <h2>MEET BAGGIO!</h2>

                        <form class="date-form" action="{{ route('book.index') }}" method="GET">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-group input-daterange input-group" id="datepicker">
                                <div class="col-sm-6">
                                    <label for="howMany">Pickup</label>
                                    <input type="text" class="form-control" name="pickupDate"
                                           value="{{ $nowString }}"/>
                                    <select class="form-control" name="pickupTime">
                                        @for($i = 10; $i <= 21; $i++)
                                            <option value="{{ $i }}">{{ $i }}:00</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label for="howMany">Return</label>
                                    <input type="text" class="form-control" name="returnDate"
                                            value="{{ $tomorrowString }}"/>
                                    <select class="form-control" name="returnTime">
                                        @for($i = 10; $i <= 21; $i++)
                                            <option value="{{ $i }}">{{ $i }}:00</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="howMany">How Many Vespa?</label>
                                    <input type="text" class="form-control" id="howMany" name="quantity">
                                </div>
                            </div>

                            <div class="form-group call-to-book">
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="btn btn-default btn-book col-sm-12">
                                        Rent Now!
                                    </button>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div><! --/row -->
            </div> <!-- /container -->
        </div>
    </div><! --/headerwrap -->
@endsection

@section('content')
    <section id="about"></section>
    <div class="container">
        <div class="row centered mt mb">
            <h1>Explore Bandung With Joy and Style</h1>

            <div class="margin-bottom-50"></div>

            <div class="col-lg-8 col-lg-offset-2">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>

            <div class="margin-bottom-50"></div>
        </div><! --/row -->

        <div class="row centered mt mb">
            <h1>Our Lovely Unit</h1>

            <div class="margin-bottom-50"></div>

            <div class="col-lg-8 col-lg-offset-2">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img src="{{ url('img/vespa1-1.jpg') }}" class="img-responsive">
                        <div class="caption">
                            <h3>Vespa PX-156</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img src="{{ url('img/vespa2-1.png') }}" class="img-responsive">
                        <div class="caption">
                            <h3>Vespa PX-156</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><! --/row -->
    </div><! --/container -->

    <section id="pricelist"></section>
    <div class="container">
        <div class="row">
            <h1 class="centered">Price List</h1>

            <div class="margin-bottom-50"></div>

            <div class="col-sm-10 col-sm-offset-1">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Half Day</th>
                            <th>Full Day</th>
                            <th>Additional Days</th>
                            <th>Weekly</th>
                            <th>Monthly</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="vert-align">100.000 IDR</td>
                            <td class="vert-align">130.000 IDR</td>
                            <td>
                                <p>1 day: 208.000 IDR</p>
                                <p>2 day: 312.000 IDR</p>
                                <p>3 day: 416.000 IDR</p>
                                <p>4 day: 520.000 IDR</p>
                                <p>5 day: 624.000 IDR</p>
                            </td>
                            <td class="vert-align">682.500 IDR</td>
                            <td class="vert-align">2.730.000 IDR</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><! --/row -->
    </div><! --/container -->

    <div class="margin-bottom-50"></div>

    <div id="social">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-3 col-lg-offset-3">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
                <div class="col-lg-3">
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div><! --/row -->
        </div><! --/container -->
    </div><! --/social -->
@endsection

@section('script-end')
    @parent

    <script type="text/javascript" src="{{ url('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $('#datepicker').datepicker({
            'format': 'dd/mm/yyyy'
        });
    </script>
@endsection