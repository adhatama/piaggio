@extends('layouts.main-v3')

@section('content')
<div class="order-toggle visible-xs">
	<i class="in cart icon"></i>
</div>
<div class="bg-image book" style="background-image:url({{ url("img/scooter_town_bg.png") }})">
    <div class="ui container stackable grid book-container">
	    <div class="ten wide column">
    		<form action="" class="ui form">
		    	<div class="accord-wrap">
		    		<!-- Nav tabs -->
		    		<ul class="nav nav-tabs" role="tablist">
		    		  <li role="presentation" class="active"><a href="#request" aria-controls="request" role="tab" data-toggle="tab">Request <span>1</span></a></li>
		    		  <li role="presentation"><a href="#choose" aria-controls="choose" role="tab" data-toggle="tab">Choose Baggio <span>2</span></a></li>
		    		  <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Pick-up Location <span>3</span></a></li>
		    		  <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review &amp; Book <span>4</span></a></li>
		    		</ul>
		    		
		    		<!-- Tab panes -->
		    		<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="request">
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
												<div class="nine wide field">
						                            <input type="text" name="pickupDate" id="pickupDate" placeholder="Date" />
												</div>
					                            <div class="five wide field">
					                            	<input type="text" name="pickupHour" id="pickupHour" placeholder="Hour" />
					                            </div>
											</div>
										</div><!-- seven field -->
										<div class="seven field">
											<label for="">Return</label>
											<div class="fields">
												<div class="nine wide field">
						                            <input type="text" name="returnDate" id="returnDate" placeholder="Date" />
												</div>
					                            <div class="five wide field">
					                            	<input type="text" name="returnHour" id="returnHour" placeholder="Hour" />
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
				                                <option value="1">1</option>
				                            </select>
										</div><!-- field -->
									</div>
								</div><!-- group-wrap -->
							</div>
							<button class="ui red button" href="#choose" aria-controls="choose" role="tab" data-toggle="tab">Continue</button>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="choose">
							<div class="tab-wrap">
								<h5 class="form-title">Select Baggio</h5>
								<div class="baggio-wrap">
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									  	<!-- Indicators -->
									  	<!-- <ol class="carousel-indicators">
									    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									  	</ol> -->

									  	<!-- Wrapper for slides -->
									  	<div class="carousel-inner" role="listbox">
										    <div class="item active">
										      	<div class="item-bg" style="background-image: url({{url('img/vespa1-1.jpg')}})"></div>
										      	<div class="carousel-caption">
										      		<h2 class="baggio-name">Piaggio Lx-124</h2>
										        	<div class="field">
										        		<label>Quantity</label>
										        		<div class="fields">
											        		<div class="ten wide field">
												        		<select name="lx-124" class="upward">
												        		    <option value="1">1</option>
												        		</select>
											        		</div>
											        		<div class="six wide field">
											        			<button class="ui button red ">Select</button>
											        		</div>
											        	</div>
										        	</div>
										      	</div>
										    </div>
										    <div class="item">
										      	<div class="item-bg" style="background-image: url({{url('img/vespa2-1.png')}})"></div>
										      	<div class="carousel-caption">
										      		<h2 class="baggio-name">Piaggio Px-169</h2>
										        	<div class="field">
										        		<label>Quantity</label>
										        		<div class="fields">
											        		<div class="ten wide field">
												        		<select name="lx-123" class="upward">
												        		    <option value="1">1</option>
												        		</select>
											        		</div>
											        		<div class="six wide field">
											        			<button class="ui button red ">Select</button>
											        		</div>
											        	</div>
										        	</div>
										      	</div>
										    </div>
										    <div class="item">
										      	<div class="item-bg" style="background-image: url({{url('img/vespa3.jpg')}})"></div>
										      	<div class="carousel-caption">
										      		<h2 class="baggio-name">Piaggio Primavera</h2>
										        	<div class="field">
											        	<label>Quantity</label>
											        	<div class="fields">
											        		<div class="ten wide field">
												        		<select name="lx-122" class="upward" class="ui select dropdown">
												        		    <option value="1">1</option>
												        		</select>
											        		</div>
											        		<div class="six wide field">
											        			<button class="ui button red ">Select</button>
											        		</div>
											        	</div>
										        	</div>
										      	</div>
										    </div>
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
								</div>
							</div>	
							<button class="ui red button" href="#location" aria-controls="location" role="tab" data-toggle="tab">Continue</button>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="location">
							<div class="tab-wrap">
								<h5 class="form-title">Enter Detail Location</h5>	
								<div class="map-holder">
									<input type="text" placeholder="Enter location">
								</div>
							</div>
							<button class="ui red button" href="#review" aria-controls="review" role="tab" data-toggle="tab">Continue</button>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="review">
							<div class="tab-wrap">
								<h5 class="form-title">Enter User Detail</h5>	
								<div class="user-form">
									<h4 class="ui dividing header">
										<div class="img-holder hidden-xs"><img src="{{url('img/user.png')}}" alt="guest"></div>
										GUEST DETAIL
									</h4>
									<div class="field">
									    <div class="two fields">
									      	<div class="field">
									        	<input name="firstName" placeholder="First Name" type="text">
									      	</div>
									      	<div class="field">
									        	<input name="lastName" placeholder="Last Name" type="text">
									      	</div>
									    </div>
									    <div class="two fields">
									      	<div class="field">
									        	<input type="text" name="phone" placeholder="Phone">
									      	</div>
									      	<div class="field">
									        	<input type="email" name="email" placeholder="Email">
									      	</div>
									    </div>
									    <div class="field">
									    	<textarea name="" id="" cols="30" rows="5"></textarea>
									    </div>
								    </div>
								</div><!-- user-form -->
							</div>
							<button class="ui red button" >Confirm &amp; Book</button>
						</div>
		    		</div><!-- tab-content -->

		    	</div><!-- .accord-wrap -->
		    </form>
	    </div>
	    <div class="six wide p-l-n column order-review">
	    	<div class="info-wrap bg-white border b-r">
	    		<h2 class="info-title text-center">Order Info <span class="visible-xs" id="close-order">x</span></h2>
	    		<div class="order-wrap">
	    			<div id="pickup-text">
	    				Pick-Up Time <span class="pull-right">18 November 2017 at 10.00</span>
	    			</div>
	    			<div id="return-text">
	    				Return Time <span class="pull-right">19 November 2017 at 10.00</span>
	    				<p class="text-right small info">(Full Day)</p>
	    			</div>
	    			<div id="baggio-text">
	    				Baggio <span class="pull-right"><span class="info">(2)</span> Vespa PX-176</span>
	    			</div>
	    			<div id="location-text">
	    				Pick-Up Location <span class="pull-right">Bandung Digital Valley</span>
	    			</div>
	    			<div id="subtotal-text">
	    				SUBTOTAL : <span class="pull-right">260.000 IDR</span>
	    			</div>
	    			<div id="promo-text">
	    				Promotion <span class="pull-right">-</span>
	    			</div>
	    			<div id="total-text">
	    				TOTAL <span class="pull-right">260.000 IDR</span>
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
            format: 'd/m/Y H:i',
            timepicker:false,
            onShow:function( ct ){
                this.setOptions({
                    maxDate:jQuery('#returnDate').val()?jQuery('#returnDate').val():false
                })
            }
        });
        $('#pickupHour').datetimepicker({
            datepicker:false
        });

        $('#returnDate').datetimepicker({
            format: 'd/m/Y H:i',
            timepicker:false,
            onShow:function( ct ){
                this.setOptions({
                    minDate:jQuery('#pickupDate').val()?jQuery('#pickupDate').val():false
                })
            }
        });
        $('#returnHour').datetimepicker({
            datepicker:false
        });
        $('.carousel').carousel({
        	interval: false
        });
        if ($(window).width() < 767) {
        	$('.home-form-container').appendTo('.modal-body');
        }
    </script>
@endsection