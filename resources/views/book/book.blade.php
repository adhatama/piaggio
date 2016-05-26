@extends('layouts.main-v3')

@section('style-head')
    @parent

    <link href="{{ url('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ url('fullcalendar/fullcalendar.print.css') }}" rel="stylesheet" media='print'>

    <link href="{{ url('bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet">

    <style>
	   #map {
	     height: 100%;
	     min-height: 300px;
	   }
	   .controls {
	     margin-top: 10px;
	     border: 1px solid transparent;
	     border-radius: 2px 0 0 2px;
	     box-sizing: border-box;
	     -moz-box-sizing: border-box;
	     height: 32px;
	     outline: none;
	     box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	   }

	   #pac-input {
	     background-color: #fff;
	     font-family: Roboto;
	     font-size: 15px;
	     font-weight: 300;
	     margin-left: 12px;
	     margin-top: 10px;
	     padding: 0 11px 0 13px;
	     text-overflow: ellipsis;
	     width: 300px;
	   }

	   #pac-input:focus {
	     border-color: #4d90fe;
	   }

	   .pac-container {
	     font-family: Roboto;
	   }

	   #type-selector {
	     color: #fff;
	     background-color: #4d90fe;
	     padding: 5px 11px 0px 11px;
	   }

	   #type-selector label {
	     font-family: Roboto;
	     font-size: 13px;
	     font-weight: 300;
	   }
	   #target {
	     width: 345px;
	   }
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
	        function initAutocomplete() {
	            var bandung = new google.maps.LatLng(-6.918020, 107.620584);

	            var map = new google.maps.Map(document.getElementById('map'), {
	                center: bandung,
	                zoom: 15,
	                scrollwheel: false
	            });
	            

	            // Create the search box and link it to the UI element.
				var input = document.getElementById('pac-input');
				var searchBox = new google.maps.places.SearchBox(input);
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

				// Bias the SearchBox results towards current map's viewport.
				map.addListener('bounds_changed', function() {
				    searchBox.setBounds(map.getBounds());
				});

				var markers = [];
				  // Listen for the event fired when the user selects a prediction and retrieve
				  // more details for that place.
				  searchBox.addListener('places_changed', function() {
				    var places = searchBox.getPlaces();

				    if (places.length == 0) {
				      return;
				    }

				    // Clear out the old markers.
				    markers.forEach(function(marker) {
				      marker.setMap(null);
				    });
				    markers = [];

				    // For each place, get the icon, name and location.
				    var bounds = new google.maps.LatLngBounds();
				    places.forEach(function(place) {
				      var icon = {
				        url: place.icon,
				        size: new google.maps.Size(71, 71),
				        origin: new google.maps.Point(0, 0),
				        anchor: new google.maps.Point(17, 34),
				        scaledSize: new google.maps.Size(25, 25)
				      };

				      // Create a marker for each place.
				      markers.push(new google.maps.Marker({
				        map: map,
				        icon: icon,
				        title: place.name,
				        position: place.geometry.location
				      }));

				      	var LAT = place.geometry.location.lat();
				      	var LNG = place.geometry.location.lng();
				      	$('input[name="latitude"]').val(LAT);
  	                	$('input[name="longitude"]').val(LNG);
  	                	$('#location-text .pull-right').text(place.name);

				      if (place.geometry.viewport) {
				        // Only geocodes have viewport.
				        bounds.union(place.geometry.viewport);
				      } else {
				        bounds.extend(place.geometry.location);
				      }
				    });
				    map.fitBounds(bounds);
				  });


	//             var marker = new google.maps.Marker({
	//                 position: bandung,
	//                 map: map,
	//                 draggable: true
	//             });

	//             google.maps.event.addListener(marker, 'dragend', function(event) {
	// //                console.log(marker.getPosition().M);
	// //                console.log( 'Lat: ' + event.latLng.lat() + ' and Longitude is: ' + event.latLng.lng() );
	//                 $('input[name="latitude"]').val(marker.getPosition().J);
	//                 $('input[name="longitude"]').val(marker.getPosition().M);
	//             });

	//             google.maps.event.addListenerOnce(map, 'idle', function(){
	//                 google.maps.event.trigger(marker, 'dragend');
	//             });
	        }

	    </script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwHX7M8ZyQbyJ62yGrui8c9YtjWQzwf9c&libraries=places&callback=initAutocomplete"
	         async defer></script>
@endsection

@section('content')
<div class="order-toggle visible-xs">
	<i class="in cart icon"></i>
</div>
<div class="bg-image book" style="background-image:url({{ url("img/scooter_town_bg.png") }})">
    <div class="ui container stackable grid book-container">
	    <div class="ten wide column ui form">
	    	<div class="accord-wrap">
	    		<!-- Nav tabs -->
	    		<ul class="nav nav-tabs" role="tablist">
	    		  <li role="presentation"><a data-href="#request" aria-controls="request" role="tab">Request <span>1</span></a></li>
	    		  <li role="presentation" class="active"><a data-href="#choose" aria-controls="choose" role="tab">Choose Baggio <span>2</span></a></li>
	    		  <li role="presentation"><a data-href="#location" aria-controls="location" role="tab">Pick-up Location <span>3</span></a></li>
	    		  <li role="presentation"><a data-href="#review" aria-controls="review" role="tab">Review &amp; Book <span>4</span></a></li>
	    		</ul>
	    		
	    		<!-- Tab panes -->
	    		<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade" id="request">
						<div class="tab-wrap">
							<h5 class="form-title">Check Availability</h5>	
							<div class="group-wrap">
								<div class="fields">
									<div class="two field hidden-xs">
										<div class="img-holder"><img src="{{url("img/calendar.png")}}" alt="date" width="28"></div>
									</div>
									<div class="seven field">
										<label for="">Pick-Up</label>
										<div class="fields">
											<div class="sixteen wide field">
					                            <input type="text" name="pickupDate" id="pickupDate" placeholder="Pickup Date" value="{{ $pickupDate }}" />
				                            </div>
										</div>
									</div><!-- seven field -->
									<div class="seven field">
										<label for="">Return</label>
										<div class="fields">
											<div class="sixteen wide field">
					                            <input type="text" name="returnDate" id="returnDate" placeholder="Return Date" value="{{ $returnDate }}" />
				                            </div>
										</div>
									</div><!-- seven field -->
								</div><!-- fields -->
							</div><!-- group-wrap -->
							<div class="group-wrap">
								<div class="fields">
									<div class="two field hidden-xs">
										<div class="img-holder"><img src="{{url("img/marker.png")}}" alt="location" width="32"></div>
									</div>
									<div class="five field">
										<label for="">City</label>
			                            <select name="city">
			                                <option value="bandung">Bandung</option>
			                            </select>
									</div>
								</div>
							</div><!-- group-wrap -->
							<div class="group-wrap">
								<div class="fields">
									<div class="two field hidden-xs">
										<div class="img-holder"><img src="{{url("img/scooter.png")}}" alt="scooter" width="32"></div>
									</div>
									<div class="four field">
										<label for="">How many vespa?</label>
			                            <select name="howmany">
			                               	@for ($v = 1; $v < $avesp+1; $v++)
				                               	<?php 
				                               	$s = '';
				                               	if ($v == $quantity) {
				                               		$s = 'selected';
				                               	} ?>
				                                <option value="{{$v}}" selected="<?php echo $s; ?>">{{$v}}</option>
				                               	<?php $s = ''; ?>
											@endfor
			                            </select>
									</div><!-- field -->
								</div>
							</div><!-- group-wrap -->
						</div>
						<div class="ui grid padded">
							<div class="myrow">
							<div class="sixteen wide column">
								<button class="ui red right floated button bt-tab" href="#choose" aria-controls="choose" role="tab" data-toggle="tab">Continue</button>
							</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade in active" id="choose">
						<div class="tab-wrap">
							<h5 class="form-title">Select Baggio</h5>
							<div class="baggio-wrap">
								@if ($avesp > 0)
									
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								  	<!-- Indicators -->
								  	<!-- <ol class="carousel-indicators">
								    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								  	</ol> -->

								  	<!-- Wrapper for slides -->
								  	<div class="carousel-inner" role="listbox" id="vespa" data-quantity="{{$quantity}}" data-limit="{{$quantity}}">
								  		@foreach ($vespa as $vesp)
									    <div class="item">
									      	<div class="item-bg" style="background-image: url('{{ asset($vesp->image) }}')"></div>
									      	<div class="carousel-caption">
									      		<h2 class="baggio-name">{{ $vesp->name }}</h2>
									        	<div class="field">
									        		<label>Quantity</label>
									        		<div class="fields">
										        		<div class="ten wide field">
											        		<select name="{{$vesp->code}}" class="upward">
											        		<?php $q = $vesp->stock+1; ?>
											        		@for ($i = 1; $i < $q; $i++)
											        		    <option value="{{$i}}">{{$i}}</option>
											        		@endfor
											        		</select>
										        		</div>
										        		<div class="six wide field">
											        		<div class="vespa-checkbox">
											        		<label><input type="checkbox" name="vespa[]" value="{{$vesp->code}}" id="{{$vesp->name}}" class="select-vesp"><span class="ui button red">Select</span></label>
											        		</div>
										        			<!-- <button class="ui button red ">Select</button> -->
										        		</div>
										        	</div>
									        	</div>
									      	</div>
									    </div>
								  			
								  		@endforeach
								  	</div>

								  	<!-- Controls -->
								  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								    	<i class="icon huge black angle left" aria-hidden="true"></i>
								    	<span class="sr-only">Previous</span>
								  	</a>
								  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								    	<i class="icon huge black angle right" aria-hidden="true"></i>
								    	<span class="sr-only">Next</span>
								  	</a>
								</div>
								@else
									<h4>Sorry, No available Vespa at this moment</h4>
								@endif
							</div>
						</div>	
						<div class="ui grid padded">
							<div class="myrow">
							<div class="sixteen wide">
								<button class="ui red left floated button bt-tab" href="#request" aria-controls="request" role="tab" data-toggle="tab">Back</button>
								<button class="ui red right floated button bt-tab" href="#location" aria-controls="location" role="tab" data-toggle="tab">Continue</button>
							</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="location">
						<div class="tab-wrap">
							<h5 class="form-title">Enter Detail Location</h5>	
							<div class="map-holder">
								<input id="pac-input" class="controls" type="text" placeholder="Enter Location">
								<!-- <input type="text" placeholder="Enter location"> -->
							</div>
							<div class="map-container">
								<div id="map"></div>
							</div>
						</div>
						<div class="ui grid padded">
							<div class="myrow">
								<div class="sixteen wide column">
									<button class="ui red button bt-tab" href="#choose" aria-controls="choose" role="tab" data-toggle="tab">Back</button>
									<button class="ui red right floated button bt-tab" href="#review" aria-controls="review" role="tab" data-toggle="tab">Continue</button>
								</div>	
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="review">

					<form method="POST" action="{{ route('book.store') }}" class="">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <input type="hidden" name="pickupDate" value="{{ $oriPickupDate }}">
	                    <input type="hidden" name="returnDate" value="{{ $oriReturnDate }}">
	                    <input type="hidden" name="quantity" value="{{ $quantity }}">
	                    <input type="hidden" name="price" value="{{ $price }}">
	                    <input type="hidden" name="latitude">
	                    <input type="hidden" name="longitude">
	                    @foreach ($vespa as $vesp)
	                    	<input type="hidden" name="{{$vesp->code}}" id="{{$vesp->id}}" value="" class="input-vespa">
	                    @endforeach
	                    <input type="hidden" name="vespa">
						<div class="tab-wrap">
							<h5 class="form-title">Enter User Detail</h5>	
							<div class="user-form">
								<h4 class="ui dividing header">
									<div class="img-holder hidden-xs"><img src="{{url('img/user.png')}}" alt="guest"></div>
									GUEST DETAIL
								</h4>
								<div class="field">
								    <div class="field">
							        	<input name="name" value="{{ old('name') }}" placeholder="First Name" type="text">
								    </div>
								    <div class="two fields">
								      	<div class="field">
								        	<input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone">
								      	</div>
								      	<div class="field">
								        	<input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
								      	</div>
								    </div>
								    <div class="field">
								    	<textarea class="form-control" id="comment"
								    	       name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
								    </div>
							    </div>
							</div><!-- user-form -->
						</div>
						<div class="ui grid padded">
							<div class="myrow">
								<div class="sixteen wide column">
									<button class="ui red left floated button bt-tab" href="#location" aria-controls="location" role="tab" data-toggle="tab">Back</button>
									<button type="submit" class="ui red right floated button" >Confirm &amp; Book</button>
								</div>
							</div>
						</div>
					</form>	

					</div>
	    		</div><!-- tab-content -->

	    	</div><!-- .accord-wrap -->
	    </div>
	    <div class="six wide p-l-n column order-review">
	    	<div class="info-wrap bg-white border b-r">
	    		<h2 class="info-title text-center">Order Info <span class="visible-xs" id="close-order">x</span></h2>
	    		<div class="order-wrap">
	    			<div id="pickup-text">
	    				Pick-Up Time <span class="pull-right">{{ $pickupDateString }}</span>
	    			</div>
	    			<div id="return-text">
	    				Return Time <span class="pull-right">{{ $returnDateString }}</span>
	    				<p class="text-right small info">({{ $diffString }})</p>
	    			</div>
	    			<div id="baggio-text">
	    				Baggio <div class="pull-right"></div>
	    				
	    			</div>
	    			<div id="location-text">
	    				Pick-Up Location <span class="pull-right"></span>
	    			</div>
	    			<div id="subtotal-text">
	    				SUBTOTAL : <span class="pull-right">{{ number_format($price) }}  IDR</span>
	    			</div>
	    			<div id="promo-text">
	    				Promotion <span class="pull-right">-</span>
	    			</div>
	    			<div id="total-text">
	    				TOTAL <span class="pull-right">{{ number_format($price) }}  IDR</span>
	    			</div>
	    		</div>
	    		<div class="promo-code-wrap ui form">
			      	<label for="code">Promo Code</label>
			      	<input type="checkbox" class="pull-left" name="code" id="code">
    			    <div class="code-form">
    			    	<div class="fields">
    			    		<div class="eleven wide field">
    			    			<input type="text" name="code" placeholder="Enter Code">
    			    		</div>
    			    		<div class="five wide field">
    			    			<input type="submit" class="submit-code ui button red" value="APPLY">
    			    		</div>
    			    	</div>
    			    </div><!-- .code-form -->
	    		</div><!-- .promo-code-wrap -->
	    	</div><!-- .info-wrap -->
	    	<div class="baggio-info">
	    		<div class="ui grid">
	    			<div class="sixteen wide phone ten wide computer column">
	    				<h4 class="info-label">HEAD OFFICE</h4>
	    				<p>Jl. Parakan Waas 2 no. 30, <br> Batununggal, Buah Batu, <br> Bandung</p>
	    			</div>
	    			<div class="sixteen wide phone six wide computer column">
	    				<h4 class="info-label">CONTACT</h4>
	    				<p>0856 1234 5678 <br> <a href="mailto:hello@baggio.com">hello@baggio.com</a></p>
	    			</div>
	    		</div>
	    	</div><!-- .baggio-info -->
	    </div>
        <!-- <div class="center aligned sixteen wide column home-title">
            <div class="heading-wrap">
            	<h1 class="ui header"><span>Meet Basdfaggio!</span></h1>
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
        </div> -->
    </div>
</div>


@endsection

@section('script-end')
    @parent

    <script type="text/javascript">
        $('#pickupDate').datetimepicker({
            format: 'd-m-Y H:i:s',
            // timepicker:false,
            onShow:function( ct ){
                this.setOptions({
                    maxDate:jQuery('#returnDate').val()?jQuery('#returnDate').val():false
                })
            },
            // onChangeDateTime:function(dp,$input){
            //     $.post('http://localhost/piaggio/public/book/change_date', { "_token": $( 'input[name=_token]' ).val(), "date": $input.val()}, function(data) {
            //     	$('#pickup-text span').text(data);
            //     });
            // }
        });
        $('#pickupHour').datetimepicker({
            datepicker:false
        });

        $('#returnDate').datetimepicker({
            format: 'd-m-Y H:i:s',
            // timepicker:false,
            onShow:function( ct ){
                this.setOptions({
                    minDate:jQuery('#pickupDate').val()?jQuery('#pickupDate').val():false
                })
            },
            // onChangeDateTime:function(dp,$input){
            //     $.post('http://localhost/piaggio/public/book/change_date', { "_token": $( 'input[name=_token]' ).val(), "date": $input.val()}, function(data) {
            //     	$('#return-text span').text(data);
            //     });
            // }
        });
        $('#returnHour').datetimepicker({
            datepicker:false
        });
        $('.carousel').carousel({
        	interval: false
        });
        $('.carousel-inner .item:first-child').addClass('active');
        if ($(window).width() < 767) {
        	$('.home-form-container').appendTo('.modal-body');
        }
        $('.bt-tab[href="#location"]').on('shown.bs.tab', function(e) {
	        google.maps.event.trigger(map, 'resize');
	    });
	    $('.bt-tab').click(function(event) {
	    	var sel = $(this).attr('href');
	    	$('.nav-tabs li').removeClass('active');
	    	console.log(sel);
	    	$('.nav-tabs li a[data-href="'+sel+'"]').parent().addClass('active');
	    });
	    $('select[name="howmany"]').on('change', function(event) {
	    	$('#vespa').attr('data-quantity',$(this).val());
	    	$('#vespa').attr('data-limit',$(this).val());
	    	/* Act on the event */
	    });
	    $('input.select-vesp').on('change', function() {
      		var limit = $('#vespa').attr('data-quantity');
      		var limited = $('#vespa').attr('data-limit');
	  		var name = $(this).attr('id');
	  		var amount = $('select[name="'+this.value+'"').val();
	    	
		      	if ($(this).is(':checked')) {
			    	if (limit > 0 && amount) {
			    		if (amount <= limit) {
				      		$(this).next('span').text('Selected');
				      		$('#baggio-text .pull-right').append('<span class="m-l-md" id="vesp-'+this.value+'"><span class="info">('+amount+')</span> <span class="name">'+name+'</span></span>');
				      		$('form input[name="'+this.value+'"]').val(amount);
				      		var newlimit = parseInt(limit) - parseInt(amount);
				      		$('#vespa').attr('data-quantity', newlimit);
				      		$('select[name="'+this.value+'"').parent().addClass('disabled');
			      		}else{
			      			alert('You have selected only '+limit+' quantity')
			      		}
		      		}else{
		      			alert('You have already selected '+limited+' Vespa')
		      		}
		      	}else{
		      		$(this).next('span').text('Select');
		      		$('#vesp-'+this.value).remove();
		      		$('form input[name="'+this.value+'"]').val('');
		      		var newlimit = parseInt(limit) + parseInt(amount);
		      		$('#vespa').attr('data-quantity', newlimit);
		      		$('select[name="'+this.value+'"').parent().removeClass('disabled');
		      	}
	    });

        $('.bt-tab[href="#review"]').on('shown.bs.tab', function(e) {
        	var vespa = new Object();
        	jsonObj = [];
        	$('input.input-vespa').each(function(index, el) {
        		item = {}
		        item ["code"] = el.id;
		        item ["amount"] = el.value;

		        jsonObj.push(item);
        		// var name = el.name;
        		// vespa.name = el.value;
        		// for (var i = 0; i < el.value; i++) {
        		// 	vespa.push(el.name);
        		// }
        	});
        	var myVespa = JSON.stringify(jsonObj);
        	$('form input[name="vespa"]').val(myVespa);
	        
	    });
    </script>
@endsection