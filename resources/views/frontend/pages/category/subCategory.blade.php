@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Sub Category
@endsection
@section('body-content')
<!-- Page Content
================================================== -->
<div class="full-page-container">

	<div class="full-page-sidebar">
		<div class="margin-top-35"></div>
		<ul>
			@if($countSubategories == 0)
				<strong>No Category Found</strong>
			@else
			@foreach($subCategories as $subCategory)
			<li style="list-style: none;"><a href="" style="color:black; font-size: 32;font-weight: bold;"><h3>{{$subCategory->name}}</h3></a></li>
			@endforeach
			@endif
		</ul>
	</div>
	<!-- Full Page Sidebar / End -->
	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			<!-- Subcategory List Container -->
			<div class="freelancers-container freelancers-grid-layout margin-top-35">

				@foreach($subCategories as $subCategory)
				<!--Sub category start -->
				<div class="freelancer">

					<a href="{{route('job.sub.category', $subCategory->id)}}" class="category-box">
						<div class="category-box-icon">
							<img src="{{ asset('images/category/' . $subCategory->image)}}" style="width: 275px; height: 150px;">
						</div>
						<!-- <div class="category-box-counter">612</div> -->
						<div class="category-box-content">
							<h3>{{$subCategory->name}}</h3>
							
						</div>
					</a>
				</div>
				@endforeach
				<!-- sub category  / End -->

				
	
			</div>
			<!-- Freelancers Container / End -->

			<!-- Pagination -->
			<div class="clearfix"></div>
			<!-- <div class="pagination-container margin-top-20 margin-bottom-20">
				<nav class="pagination">
					<ul>
						<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
						<li><a href="#" class="ripple-effect">1</a></li>
						<li><a href="#" class="ripple-effect current-page">2</a></li>
						<li><a href="#" class="ripple-effect">3</a></li>
						<li><a href="#" class="ripple-effect">4</a></li>
						<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
					</ul>
				</nav>
			</div> -->
			<div class="clearfix"></div>
			<!-- Pagination / End -->

			

		</div>
	</div>
	<!-- Full Page Content / End -->

</div>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection