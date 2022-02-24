@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Checkout
@endsection
@section('body-content')

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>
<div class="clearfix"></div>
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Checkout</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Pricing Plans</a></li>
						<li>Checkout</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xl-8 col-lg-8 content-right-offset">
			@php
			$checkout = App\Models\Backend\Checkout::where('user_id',Auth::user()->id)->first();
			@endphp

			<form method="POST" action="{{route('checkout.update',$checkout->id)}}" id="payment-form">
				
			@csrf
			<input type="hidden" name="rate" value="0">
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="plan_name" value="{{ $membershipPlan->plan_name }}">
            <input type="hidden" name="Billed" value="{{ $membershipPlan->Billed }}">
            <input type="hidden" name="rate" value="{{ $membershipPlan->rate }}">
			<!-- Hedaline -->
			<h3>Billing Cycle</h3>

			<!-- Billing Cycle Radios  -->
			<div class="billing-cycle margin-top-25">

				<!-- Radio -->
				<div class="radio">
					
					<label for="radio-5">
						<span class="radio-label"></span>
						Billed Monthly
						<span class="billing-cycle-details">
							<span class="regular-price-tag">${{$membershipPlan->rate}} / month</span>
						</span>
					</label>
				</div>
			
				<!-- Radio -->
				<div class="radio">
					
					<label for="radio-6"><span class="radio-label"></span>
						First Month Free
						
					</label>
				</div>
			</div>
			

			<!-- Hedline -->
			<h3 class="margin-top-50">Payment Method</h3>

			<!-- Payment Methods Accordion -->
			<div class="payment margin-top-30">

				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						
						<label for="paypal">Stripe</label>
						<img class="payment-logo paypal" src="" alt="">
					</div>

					<div class="payment-tab-content">
						<div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                         </div>
					</div>
				</div>


				

			</div>
			<button type = "submit"  class="button big ripple-effect margin-top-40 margin-bottom-65">Submit Payment</button>
		
			<!-- <a href="pages-order-confirmation.html" class="button big ripple-effect margin-top-40 margin-bottom-65">Proceed Payment</a> -->
			</form>
		

			
		</div>


		<!-- Summary -->
		<div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">
			
			<!-- Summary -->
			<div class="boxed-widget summary margin-top-0">
				<div class="boxed-widget-headline">
					<h3>Summary</h3>
				</div>
				<div class="boxed-widget-inner">
					<ul>
						<li>{{$membershipPlan->plan_name}} Plan <span>${{$membershipPlan->rate}}</span></li>
						<li>VAT (0%) <span>$0</span></li>
						<li class="total-costs">Final Price <span>${{$membershipPlan->rate}}</span></li>
					</ul>
				</div>
			</div>
			<!-- Summary / End -->

			<!-- Checkbox -->
			
		</div>

	</div>
</div>
<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51JCzs9JXz4mwbqPLxhH4Ar25QVgtA1IiuDxHFCoOACnX0xxqdLaAUozE7E7wFIhoBZPKybMq3W48GXeDR1egw5OL00OMNSoNp8');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection