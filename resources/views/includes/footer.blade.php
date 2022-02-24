
<div id="footer">
	
	<!-- Footer Top Section -->
	<div class="footer-top-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">

					<!-- Footer Rows Container -->
					<div class="footer-rows-container">
						
						<!-- Left Side -->
						<div class="footer-rows-left">
							<div class="footer-row">
								<div class="footer-row-inner footer-logo">
									<a href="{{route('home.page')}}"><img src="{{asset('img/JamTalent-Logo-White.png')}}" alt=""></a>
								</div>
							</div>
						</div>
						
						<!-- Right Side -->
						<div class="footer-rows-right">

							<!-- Social Icons -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<ul class="footer-social-links">

										<li>
											<a href="https://www.facebook.com/Happilancers-103442855243088" target="_blank" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-facebook-f"></i>
											</a>
										</li>
										<li>
											<a href="https://twitter.com/Happilancers" target="_blank" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-twitter"></i>
											</a>
										</li>
										<!-- <li>
											<a href="https://www.instagram.com/jamsamcommunity/" target="_blank" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-instagram"></i>
											</a>
										</li> -->
										<li>
											<a href="https://www.linkedin.com/in/happilancer-jamsam-b28309211/"  target="_blank" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-linkedin-in"></i>
											</a>
										</li>
										<!-- <li>
											<a href="https://www.behance.net/jamsamcommunity" target="_blank" title="Behance" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-behance"></i>
											</a>
										</li> -->
										<!-- <li>
											<a href="https://www.pinterest.com/jamsamcommunity/" target="_blank" title="Pinterest" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-pinterest"></i>
											</a>
										</li> -->
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
							
							<!-- Language Switcher -->
							<!-- <div class="footer-row">
								<div class="footer-row-inner">
									<select class="language-switcher btn-cl" data-selected-text-format="count" data-size="5">
										<option selected>English</option>
										<option>Français</option>
										<option>Español</option>
										<option>Deutsch</option>
									</select>
								</div>
							</div> -->
						</div>

					</div>
					<!-- Footer Rows Container / End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top Section / End -->

	<!-- Footer Middle Section -->
	<div class="footer-middle-section" dir="ltr">
		<div class="container">
			<div class="row">

				<!-- Links -->
				<!-- <div class="col-xl col-lg col-md-4">
					<div class="footer-links">
						<h3>{{__('footer.In-Demand Talent Categories')}}</h3>
						<ul>
							@foreach(App\Models\Backend\Category::orderBy('name','asc')->where('popular',1)->where('parent_id',0)->get() as $category)
							<li><a href="{{route('home.sub.category', $category->id)}}"><span>{{$category->name}}</span></a></li>
							</li>
							@endforeach
						</ul>
					</div>
				</div> -->

				<!-- Links -->
				<div class="col-xl col-lg col-md-4">
					<div class="footer-links">
						<h3>JamTalent</h3>
						<ul>
							<li><a href="{{route('home.about.us')}}"><span>{{__('topbar.AboutUs')}}</span></a></li>
							<li><a href="{{route('home.how')}}"><span>{{__('topbar.how')}}</span></a></li>
							<li><a href="{{route('home.knowledge.hub')}}"><span>{{__('topbar.Knowledge Hub')}}</span></a></li>
							<li><a href="{{route('register.create')}}"><span>{{__('footer.Become an Employer')}}</span></a></li>
							<li><a href="{{route('register.create')}}"><span>{{__('footer.Become a Freelancer')}}</span></a></li>
							
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl col-lg col-md-4">
					<div class="footer-links">
						<h3>{{__('footer.Helpful Links')}}</h3>
						<ul>
							<li><a href="{{route('login')}}"><span>{{__('topbar.Login')}}</span></a></li>
							<li><a href="{{route('home.contact')}}"><span>{{__('topbar.ContactUs')}}</span></a></li>
							<li><a href="{{route('home.privacy')}}"><span>{{__('footer.Privacy Policy')}}</span></a></li>
							
							
							
							
						</ul>
					</div>
				</div>
				
		
	

				<!-- Newsletter -->
				@if(session()->get('locale') == 'ar')	
				<div class="col-xl-4 col-lg-4 col-md-12" dir="rtl">
					<h3><i class="icon-feather-mail"></i>{{__('footer.Sign Up For a Newsletter')}} </h3>
					<p>{{__('footer.Weekly breaking news, analysis and cutting edge advices on job searching.')}}</p>
					<form action="{{route('subscribe.store')}}" method="POST" class="newsletter">
						@csrf
						<input type="email" dir="rtl" name="email" placeholder="{{__('footer.Enter your email address')}}">
						<button type="submit"><i class="icon-feather-arrow-right"></i></button>
					</form>
				</div>
				@else
				<div class="col-xl-4 col-lg-4 col-md-12">
					<h3><i class="icon-feather-mail"></i>{{__('footer.Sign Up For a Newsletter')}} </h3>
					<p>{{__('footer.Weekly breaking news, analysis and cutting edge advices on job searching.')}}</p>
					<form action="{{route('subscribe.store')}}" method="POST" class="newsletter">
						@csrf
						<input type="email" name="email" placeholder="{{__('footer.Enter your email address')}}">
						<button type="submit"><i class="icon-feather-arrow-right"></i></button>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
	<!-- Footer Middle Section / End -->
	
	
	<!-- Footer Copyrights -->
	<div class="">
		<div class="container">
			<div class="row">
				
					<div class="col-md-6">
						<div class="left-side">
						© 2021 <strong>JamTalent</strong>.{{__('footer.All Rights Reserved.')}} 
					</div>
					</div>
					<div class="col-md-6 ml-right">
						<div class="mr-right">
							<p> <i class="icon-material-outline-lock-open p-1"></i>{{__('footer.Payment secure by stripe')}}  <img src="{{asset('img/bktransparent.png')}}" class="img-fluid w-50 p-2"></p>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->