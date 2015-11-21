@extends('layouts.main-v3')

@section('style-head')
    <style>

    </style>
@endsection

@section('content')
    <img src="{{ url('img/vespa_header_1_cropped.jpg') }}" class="image header">

    <div class="ui container grid home-container">
        <div class="center aligned column home-title">
            <h1 style="margin-top: -10px;">Meet Baggio!</h1>
            <h2 style="margin-top: -10px;">Scooter Rental in Indonesia</h2>
            <div class="ui segment home-form-container">
                <form class="ui form">
                    <div class="fields">
                        <div class="five wide field">
                            <select name="city" class="form-control">
                                <option value="bandung">Bandung</option>
                            </select>
                        </div>
                        <div class="three wide field">
                            <input type="text" placeholder="Pickup Date">
                        </div>
                        <div class="three wide field">
                            <input type="text" placeholder="Return Date">
                        </div>
                        <div class="two wide field">
                            <input type="number" class="form-control" id="howMany" name="quantity" min="1" max="5" placeholder="How Many?">
                        </div>
                        <div class="three wide field">
                            <button type="submit" class="ui red button">Rent Now!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-end')

@endsection