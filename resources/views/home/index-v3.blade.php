@extends('layouts.main-v3')

@section('style-head')
    <style>

    </style>
@endsection

@section('content')
    <img src="{{ url('img/bg_3.jpg') }}" class="image header">

    <div class="ui container stackable grid home-container">
        <div class="center aligned sixteen wide column home-title">
            <h1 class="ui header"><span>Meet Baggio!</span></h1>
            <h2 style="margin-top: -10px;" class="ui header"><span>Scooter Rental in Indonesia</span></h2>
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