<!DOCTYPE html>
@if(session()->get('locale') == 'ar')	
<html lang="ar" dir="rtl">
@else
<html lang="en">
@endif

<head>
	<meta charset="utf-8">
	<title>Jamtalent {{__('checkoutConfirm.Invoice')}}</title>
	<link rel="stylesheet" href="{{asset('css/invoice.css')}}">
	<link rel="icon" href="{{asset('images/logo.png')}}" type="image/gif" sizes="16x16">
</head> 

@if(session()->get('locale') == 'ar')
<body lang="ar" dir="rtl" style="text-align: revert;">
@else
<body>
@endif
@php
	$checkout = App\Models\Backend\Checkout::where('user_id',Auth::user()->id)->first();
@endphp
<!-- Print Button -->
<div class="print-button-container">
	<a href="javascript:window.print()" class="print-button">{{__('checkoutConfirm.Print this invoice')}}</a>
</div>

<!-- Invoice -->
<div id="invoice">

	<!-- Header -->
	<div class="row">
		<div class="col-xl-6">
			<div id="logo"><img src="images/logo.png" alt=""></div>
		</div>

		<div class="col-xl-6">	

			<p id="details">
				<strong>{{__('checkoutConfirm.Date:')}}</strong> #{{$checkout->id}} <br>
				<strong>Expired:</strong> {{$checkout->expired_date}} <br>
				
			</p>
		</div>
	</div>


	


	<!-- Invoice -->
	<div class="row">
		<div class="col-xl-12">
			<table class="margin-top-20">
				<tr>
					<th>{{__('checkoutConfirm.Description')}}</th>
					<th>{{__('checkoutConfirm.Price')}} $</th>
					<th>{{__('checkoutConfirm.VAT')}} (0%)</th>
					<th>{{__('checkoutConfirm.Total')}} $</th>
				</tr>

				<tr>
					<td>{{$checkout->plan_name}}</td> 
					@if($checkout->transaction_id == null)
					<td>$0.00</td>

					<td>$0</td>
					<td>$0</td>
					@else
					<td>${{$checkout->rate}}</td>

					<td>$0</td>
					<td>${{$checkout->rate}}</td>
					@endif
				</tr>
			</table>
		</div>
		
		<div class="col-xl-4 col-xl-offset-8">	
			<table id="totals">
				<tr>
					<th>{{__('checkoutConfirm.Total Due')}}</th> 
					@if($checkout->transaction_id == null)
					<th><span>$0.00</span></th>
					@else
					<th><span>${{$checkout->rate}}</span></th>
					@endif
				</tr>
			</table>
		</div>
	</div>


	<!-- Footer -->
	<div class="row">
		<div class="col-xl-12">
			<ul id="footer">
				<li><span>jamtalent.net</span></li>
				<li>jamtalent.samsam@gmail.com</li>
				
			</ul>
		</div>
	</div>
		
</div>


</body>
</html>
