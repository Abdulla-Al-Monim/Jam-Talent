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
	$checkout = App\Models\Backend\OrderCheckout::where('id',$checkOut->id)->first();
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
				
				<strong>{{__('checkoutConfirm.Date:')}}</strong> {{$checkout->created_at}} <br>
				
			</p>
		</div>
	</div>


	


	<!-- Invoice -->
	<div class="row">
		<div class="col-xl-12">
			<table class="margin-top-20">
				<tr>
					<th>{{__('checkoutConfirm.Order Type')}}</th>
					<th>{{__('checkoutConfirm.Budget')}}</th>
					<th>{{__('checkoutConfirm.VAT')}} (0%)</th>
					<th>{{__('checkoutConfirm.Total')}}</th>
				</tr>

				<tr>
					@if($checkout->order_type == 1)
					<td>{{__('checkoutConfirm.Custom Offer')}}</td> 
					@elseif($checkout->order_type == 2)
					<td>{{__('checkoutConfirm.Task')}}</td> 
					@elseif($checkout->order_type == 3)
					<td>{{__('checkoutConfirm.Job')}}</td> 
					@endif
					
					<td>{{$checkout->budget}} $</td>
					<td>0 $</td>
					<td>{{$checkout->budget}} $</td>
				</tr>
			</table>
		</div>
		
		<div class="col-xl-4 col-xl-offset-8">	
			<table id="totals">
				<tr>
					<th>{{__('checkoutConfirm.Total Due')}}</th> 
					
					<th><span>${{$checkout->budget}}</span></th>
					
				</tr>
			</table>
		</div>
	</div>


	<!-- Footer -->
	<div class="row">
		<div class="col-xl-12">
			<ul id="footer">
				<li><span>jamtalent.net</span></li>
				<li>jamtalent.jamsam@gmail.com</li>
				
			</ul>
		</div>
	</div>
		
</div>


</body>
</html>
