@extends('backend.layout.template')
@section('title')
{{__('backendTask.Manage Custom Offers')}}
@endsection
@section('body-content')
<div class="dashboard-content-container" data-simplebar="init" style="height: 611px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 342px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner" style="min-height: 611px;">
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3 style="text-align:left;">{{__('backendTask.Manage Custom Offers')}}</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{route('home.page')}}">{{__('backendIndex.Home')}}</a></li>
						<li><a href="{{route('user.dashbord')}}">{{__('backendIndex.Dashboard')}}</a></li>
						<li>{{__('backendTask.Manage Custom Offers')}}</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$count}}{{__('backendTask.Custom Offer')}} </h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($customOffers as $customOffer)
								@php
												$freelancer = App\Models\User::where('id',$customOffer->freelancer_id)->first();
												@endphp
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="{{route('single.freelancer.profile',$freelancer->id)}}">
													@if($freelancer->image == null)
											           <img src="{{ asset('images/default.jpeg')}}" alt="">
											       	@else
														<img src="{{ asset('images/freelancer/' . $freelancer->image)}}" alt="">
													@endif
												</a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												
												
													
												
												<h4><a href="{{route('single.freelancer.profile',$freelancer->id)}}">{{$freelancer->full_name}} <img class="flag" src="images/flags/au.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Australia"></a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{$freelancer->email}}</a></span>
												<!-- <span class="freelancer-detail-item"><i class="icon-feather-phone"></i> (+61) 123-456-789</span> --><br>
												
												@if($customOffer->status == 0)
												<span class="company-not-rated"> {{__('backendTask.Pending Approval')}} </span>
												@else
												<span class="company-not-rated">{{__('backendTask.Accepted')}}</span>
												@endif
												

												<!-- Rating -->
												<div class="freelancer-rating">
													<div class="star-rating" data-rating="{{$freelancer->freelancerActivity->average_rating}}"></div>
												</div>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="#small-dialog-1{{$customOffer->id}}" class="button ripple-effect popup-with-zoom-anim button ripple-effect"><i class="icon-feather-file-text"></i>{{__('backendTask.Update Document')}} </a>
													<!-- Make an Offer Popup
													================================================== -->
													<div id="small-dialog-1{{$customOffer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

														<!--Tabs -->
														<div class="sign-in-form">

															<ul class="popup-tabs-nav">
																<li><a href="#tab1">{{__('backendTask.Update Document')}}</a></li>
															</ul>

															<div class="popup-tabs-container">

																<!-- Tab -->
																<div class="popup-tab-content" id="tab">
																	
																	<!-- Welcome Text -->
																	<div class="welcome-text">
																		<h3>{{__('backendTask.Update Your Document')}}</h3>
																	</div>
																		
																	<!-- Form -->
																	<form action="{{route('update.custom.offer.document',$customOffer->id)}}" method="POST"  enctype="multipart/form-data">
																		@csrf
																		

																		<textarea cols="10" placeholder="{{__('backendTask.Send Message')}}" class="with-border" name="message">{{$customOffer->message}}</textarea>

																		<div class="uploadButton margin-top-25">
																			<input class="uploadButton-input" type="file" value="{{$customOffer->file}}" accept="image/*, application/pdf" id="upload" name="file" multiple/ >
																			<label class="uploadButton-button ripple-effect" for="upload">{{__('backendTask.Add Attachments')}}</label>
																			<span class="uploadButton-file-name">{{__('backendTask.Allowed file types')}}: zip, pdf, png, jpg <br> </span>
																		</div>
																		<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('backendTask.Make an Offer')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

																	</form>
																	
																	<!-- Button -->
																	

																</div>
																

															</div>
														</div>
													</div>
													<!-- <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a> -->
													@if($customOffer->status == 0)
													<span>
															<form method="POST" action="{{route('delete.custom.offer.document',$customOffer->id)}}"enctype="multipart/form-data">
														@csrf
														<button class="btn btn-danger icon-feather-trash-2" type="submit">
														</form>	
													</span>
													@endif
												</div>
											</div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>

			</div>
			<div class="margin-bottom-25"></div>
			<div class="d-felx justify-content-center">

		            {{ $customOffers->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Row / End -->

			<!-- Footer -->
			@include('includes.dashboardFooter')
			<!-- Footer / End -->

		</div>
	</div></div></div>
@endsection