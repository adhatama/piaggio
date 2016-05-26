@extends('layouts.main-v2')

@section('header')
    @include('layouts.header-v2')
@endsection

@section('content')
    <div class="container">
        <div class="row mt mb">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3 class="text-center">LOGIN</h3>

            <div class="col-sm-6 col-sm-offset-3">
                <form method="POST" action="{{ route('login.post') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-sm-10 col-sm-offset-1">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection