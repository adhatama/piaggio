@extends('layouts.main-v3')

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
                </div><!--/row -->
            </div> <!-- /container -->
        </div>
    </div><!--/headerwrap -->
@endsection

@section('content')
    <div class="ui container">
        <div class="row mt mb">
            <h3>Booking History</h3>

            <div class="table-responsive">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th>Booker</th>
                            <th>Pickup Time</th>
                            <th>Return Time</th>
                            <th>Total Price</th>
                            <th>Vespa</th>
                            <th class="center aligned">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookingHistories as $bk)
                            <tr>
                                <td>{{ $bk->name }} <br> {{ $bk->phone . ' - ' . $bk->email }}</td>
                                <td>{{ $bk->getPickupTimeString() }}</td>
                                <td>{{ $bk->getReturnTimeString() }}</td>
                                <td>{{ number_format($bk->price) }}</td>
                                <td>{!! $bk->getVespaString() !!}</td>
                                <td class="center aligned">
                                    @if($bk->status == 0)
                                        <a href="{{ route('bookingHistory.approve', ['id'=>$bk->id]) }}" class="ui green button">Approve</a>
                                    @else
                                        Approved
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="center aligned">{!! $bookingHistories->render() !!}</div>
        </div>
    </div>
@endsection