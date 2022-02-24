@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Checkout
@endsection
@section('body-content')
<div class="clearfix"></div>
<div id="titlebar" class="gradient"> </div>

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="order-confirmation-page">
				<div class="breathing-icon"><i class="icon-feather-check"></i></div>
				<h2 class="margin-top-30">Thank you!</h2>
				<p>Your payment has been processed successfully.</p>
				<a href="{{route('invoice')}}" class="button ripple-effect-dark button-sliding-icon margin-top-30" style="width: 176.641px;">View Invoice <i class="icon-material-outline-arrow-right-alt"></i></a>
				<br>
				<a href="{{route('job.post')}}" class="button ripple-effect-dark button-sliding-icon margin-top-30" style="width: 176.641px;">Post a Job </a>
				<a href="{{route('task.post')}}" class="button ripple-effect-dark button-sliding-icon margin-top-30" style="width: 176.641px;">Post a Task </a>
				<a href="{{route('user.dashbord')}}" class="button ripple-effect-dark button-sliding-icon margin-top-30" style="width: 176.641px;">Dashboard </a>
			</div>

		</div>
	</div>
</div>
@include('includes.footer')
<!-- footer end -->
@endsection