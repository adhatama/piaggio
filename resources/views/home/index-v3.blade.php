@extends('layouts.main-v3')

@section('content')
<div class="bg-image" style="background-image:url({{ url("img/bg_3.jpg") }})">
    <div class="ui container stackable grid home-container">
        <div class="center aligned sixteen wide column home-title">
            <div class="heading-wrap">
            	<h1 class="ui header"><span>Meet Baggio!</span></h1>
            	<h2 style="margin-top: -10px;" class="ui header"><span>Scooter Rental in Indonesia</span></h2>
            </div>
            <button type="button" class="ui red button visible-xs modal-button" data-toggle="modal" data-target="#rentModal">Get Started</button>
            <div class="ui segment home-form-container">
                <form class="ui form">
                    <div class="fields">
                        <div class="four wide field">
                            <select name="city">
                                <option value="bandung">Bandung</option>
                            </select>
                        </div>
                        <div class="three wide field">
                            <input type="text" name="pickupDate" id="pickupDate" placeholder="Pickup Date"/>
                        </div>
                        <div class="three wide field">
                            <input type="text" name="returnDate" id="returnDate" placeholder="Return Date"/>
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
</div>

<!-- modal for mobile form -->

<div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="exampleModalLabel">Rent Scooter</h4>
	      	</div>
	      	<div class="modal-body">
		        
	      	</div>
	    </div>
  	</div>
</div>

@endsection

@section('script-end')
    @parent

    <script type="text/javascript">
        $('#pickupDate').datetimepicker({
            format: 'd/m/Y H:i',
            onShow:function( ct ){
                this.setOptions({
                    maxDate:jQuery('#returnDate').val()?jQuery('#returnDate').val():false
                })
            }
        });

        $('#returnDate').datetimepicker({
            format: 'd/m/Y H:i',
            onShow:function( ct ){
                this.setOptions({
                    minDate:jQuery('#pickupDate').val()?jQuery('#pickupDate').val():false
                })
            }
        });

        if ($(window).width() < 767) {
        	$('.home-form-container').appendTo('.modal-body');
        }
    </script>
@endsection