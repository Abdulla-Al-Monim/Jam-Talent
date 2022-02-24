

<style type="text/css"></style>
@if(session()->get('locale') == 'ar')	
<header id="header-container" class="fullwidth">
	<div class="container-fluid">
		<div class="row">
			<div class="col-3 col-md-2 col-xl-1">
				<!-- Right Side Content / End -->
				<div class="right-side">
					<div class="header-widget fon-lang-btn-area">
								<div class="dropdown fon-lang-btn">
									<button class="btn btn-se dropdown-toggle sidor" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" >
										<img class="flag" style="padding-right: 3px;" src="{{asset('img/output-onlinepngtools.png')}}" alt="">
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li>
											<form action="{{route('changeLang')}}" method="get">
												<input type="hidden" name="lang"value="ar">
												<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/ar.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> Arabic</button>
											</form>
										</li>
										<li>
											<form action="{{route('changeLang')}}" method="get">
												<input type="hidden" name="lang"value="en">
												<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/en_US.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> English</button>
											</form>
										</li>
										<li>
											<form action="{{route('changeLang')}}" method="get">
												<input type="hidden" name="lang"value="tk">
												<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/JamTalentFlags_TurkeyFlag.jpg')}}" alt="" data-tippy-placement="top"> Turkish</button>
											</form>
										</li>
									</div>
								</div>
							</div>
					

					<!-- User Menu -->
					<div class="header-widget">

						<!-- Messages -->
						<div class="header-notifications user-menu">
							<div class="header-notifications-trigger">
								<a href="#"><div class="user-avatar status-online">
									@if( Route::has('login'))
	            						@auth
	            							@if(Auth::user()->user_type_id == 1)
	            							@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/freelancer/' . Auth::user()->image)}}" alt="">
											@endif
											@elseif(Auth::user()->user_type_id == 0)
	            							@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
											@endif
											@elseif(Auth::user()->user_type_id ==2)
											@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
											@endif
											@elseif(Auth::user()->user_type_id ==3)
											@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/employer/' . Auth::user()->image)}}" alt="">
											@endif
											@endif
											@else
											<img src="{{ asset('images/icon/outline_perm_identity_black_24dp.png')}}" alt="">
										@endif
									@endif
								</div></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-online">
											@if( Route::has('login'))
			            						@auth
			            							@if(Auth::user()->user_type_id == 1)
			            							@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/freelancer/' . Auth::user()->image)}}" alt="">
													@endif
													@elseif(Auth::user()->user_type_id == 0)
			            							@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
													@endif
													@elseif(Auth::user()->user_type_id ==2)
													@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
													@endif
													@elseif(Auth::user()->user_type_id ==3)
													@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/employer/' . Auth::user()->image)}}" alt="">
													@endif
													@endif
													@else
												<img src="{{ asset('images/icon/outline_perm_identity_black_24dp.png')}}" alt="">
												@endif
												
											@endif
										</div>
										<div class="user-name">
											@if( Route::has('login'))
			            						@auth
			            							@if(Auth::user()->user_type_id == 1)
			            							@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif
													<span>{{__('topbar.Freelancer')}} </span>
													@elseif(Auth::user()->user_type_id == 2)

													@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif 
													<span> {{__('topbar.Admin')}}</span>
													@elseif(Auth::user()->user_type_id == 3)

													@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif
													<span>{{__('topbar.Employer')}}  </span>
													@elseif(Auth::user()->user_type_id == 0)
													@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif
													<span>{{__('topbar.Super Admin')}}</span>
													@endif
												@endif
											@endif
											

										</div>
									</div>
									
									<!-- User Status Switcher -->
									<!-- <div class="status-switch" id="snackbar-user-status"> -->
										<!-- <label class="user-online current-status">Online</label>
										<label class="user-invisible">Invisible</label> -->
										<!-- Status Indicator -->
										<!-- <span class="status-indicator" aria-hidden="true"></span>
									</div>	 -->
							</div>
							
							<ul class="user-menu-small-nav">
								
								@if( Route::has('login'))
			            			@auth
			            				<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-dashboard"></i> {{__('topbar.Dashboard')}}</a></li>
										<!-- <li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li> -->
										<li>
											<form method="POST" action="{{ route('logout') }}">
									          @csrf

									          <a href="{{ route('logout') }}" class="icon-material-outline-power-settings-new"
									              onclick="event.preventDefault();
									              this.closest('form').submit();">
									              @if (session()->get('language') == 'arbi') تسجيل خروج @else
									              {{__('topbar.Log out')}}
									              @endif
									              
									          </a>
									        </form>
									    </li>
									    @else
									    <li>
											<a href="{{route('login')}}">{{__('topbar.Login')}}</a>
										</li>
							    	@endif
							    	
							    @endif
							    
							</ul>

							</div>
						</div>

					</div>
					<!-- User Menu / End -->

					<!-- Mobile Navigation Button -->
					<!-- <span class="mmenu-trigger">
						<button class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</span> -->


				</div>
				<!-- Right Side Content / End -->
			</div>
			<div class="col-9 col-md-10 col-xl-11">
				<nav class="navbar navbar-expand-lg navbar-light">
					
				  <a class="navbar-brand" href="{{route('home.page')}}"><img style="width: 50px;" src="{{asset('images/logo.png')}}" alt=""></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
			    	<li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          {{__('topbar.AboutUs')}}
			        </a>
			        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="{{route('home.about.us')}}">{{__('topbar.AboutUs')}}</a>
			          <a class="dropdown-item" href="{{route('home.contact')}}">{{__('topbar.ContactUs')}}</a>
			          <div class="dropdown-divider"></div>
			          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
			        </div>
			      </li>
				      <li class="nav-item active">
				        <a class="nav-link" href="{{route('home.how')}}">{{__('topbar.how')}}</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{route('home.knowledge.hub')}}">{{__('topbar.Knowledge Hub')}}</a>
				      </li>
				      
				      <li class="nav-item">
				        <a class="nav-link disabled" href="{{route('happilancing')}}" tabindex="-1" aria-disabled="true">{{__('topbar.Happilancing')}}</a>
				      </li>
				      @if( Route::has('login'))
	            						@auth
	            						@else
				      <li class="nav-item">
				        <a class="nav-link disabled" href="{{route('login')}}" tabindex="-1" aria-disabled="true">{{__('topbar.Login')}}</a>
				      </li>
				      @endif
							@endif

							@if( Route::has('login'))
	            						@auth
	            						@else
				      <li class="nav-item">
				        <a class="nav-link disabled" href="{{route('register.create')}}" tabindex="-1" aria-disabled="true">Join Jamtalent</a>

				      </li>
				      @endif
							@endif
							<li class="nav-item btn btn-primary">
				        <a class="nav-link disabled" href="{{route('all.freelancer')}}" style="color:white" tabindex="-1" aria-disabled="true">{{__('topbar.Find Talent')}}</a>

				      </li>
				    </ul>
				    
				  </div>
				</nav>
			</div>
			
		</div>
	</div>
</header>
@else
<header id="header-container" class="fullwidth">
	<div id="header">
			<div class="container">
				
				<!-- Left Side Content -->
				<div class="left-side">
					
					<!-- Logo -->
					<div id="logo">
						<a href="{{route('home.page')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
					</div>
					<!-- <div class="row">
	            <div class="col-md-2 col-md-offset-6 text-right">
	                <strong>Select Language: </strong>
	            </div>
	            <div class="col-md-4">
	                <select class="form-control changeLang">
	                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
	                    <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>France</option>
	                    <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
	                </select>
	            </div>
	        </div> -->
	        
									
								
					<!-- Main Navigation -->

					<nav id="navigation">
						<ul id="responsive">
							<li><a href="{{route('home.about.us')}}">{{__('topbar.AboutUs')}}</a>
										<ul class="dropdown-nav">
											<li><a href="{{route('home.contact')}}">{{__('topbar.ContactUs')}}</a></li>
											
										</ul>
									</li>
							<!-- <li><a href="{{route('home.about.us')}}">About Us</a> -->
							<!-- <li><a href="">{{__('topbar.language')}}</a>
									<ul class="dropdown-nav">
										<li>
											<form action="{{route('changeLang')}}" method="get">
											<input type="hidden" name="lang"value="ar">
											<button type="submit"  class="changeLang " style="color:white;"><img class="flag" src="{{asset('img/ar.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> Arabic</button>
										</form>
										</li>
										<li>
											<form action="{{route('changeLang')}}" method="get">
											<input type="hidden" name="lang"value="en">
											<button type="submit"  class="changeLang " style="color:white;"><img class="flag" src="{{asset('img/en_US.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> English</button>
										</form>
										</li>
										<li>
											<form action="{{route('changeLang')}}" method="get">
											<input type="hidden" name="lang"value="tk">
											<button type="submit"  class="changeLang " style="color:white;"><img class="flag" src="{{asset('img/Turkey Flag 18x12.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> Turkish</button>
										</form>
										</li>
										
									</ul>
								</li>
	 									-->						
							</li>
							<li><a href="{{route('home.how')}}">{{__('topbar.how')}}</a>
							
							<!-- <li><a href="{{route('home.privacy')}}">Privacy Policy</a>
								
							</li> -->
							<!-- <li><a href="#">Find Work</a>
								
							</li>
							<li><a href="#">Why Jam Talent</a> -->
								
							</li>
							<li><a href="{{route('home.knowledge.hub')}}">{{__('topbar.Knowledge Hub')}}</a>
								
							</li>

							<li><a href="{{route('happilancing')}}"> {{__('topbar.Happilancing')}}</a>
							<!-- <li><a href="{{route('home.contact')}}">{{__('topbar.ContactUs')}}</a></li> -->
								
							</li>
							@if( Route::has('login'))
	            						@auth
	            						@else
							<li><a href="{{route('login')}}">{{__('topbar.Login')}}</a></li>
							@endif
							@endif
								@if( Route::has('login'))
	            						@auth
	            						@else
							<li><a href="{{route('register.create')}}"> Join Jamtalent</a>	
							</li>
							@endif
							@endif
							<li class="btn btn-primary"><a href="{{route('all.freelancer')}}" class="btn" style="color:white">{{__('topbar.Find Talent')}}</a>
								
							</li>
						</ul>
					</nav>
				
					<div class="clearfix"></div>
					<!-- Main Navigation / End -->
					
				</div>
				<!-- Left Side Content / End -->


				<!-- Right Side Content / End -->
				<div class="right-side">
					<div class="header-widget fon-lang-btn-area">
								<div class="dropdown fon-lang-btn">
									<button class="btn btn-se dropdown-toggle sidor" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" >
										<img class="flag" style="padding-right: 3px;" src="{{asset('img/output-onlinepngtools.png')}}" alt="">
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li>
											<form action="{{route('changeLang')}}" method="get">
												<input type="hidden" name="lang"value="ar">
												<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/ar.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> Arabic</button>
											</form>
										</li>
										<li>
											<form action="{{route('changeLang')}}" method="get">
												<input type="hidden" name="lang"value="en">
												<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/en_US.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> English</button>
											</form>
										</li>
										<li>
											<form action="{{route('changeLang')}}" method="get">
												<input type="hidden" name="lang"value="tk">
												<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/JamTalentFlags_TurkeyFlag.jpg')}}" alt="" data-tippy-placement="top"> Turkish</button>
											</form>
										</li>
									</div>
								</div>
							</div>
					

					<!-- User Menu -->
					<div class="header-widget">

						<!-- Messages -->
						<div class="header-notifications user-menu">
							<div class="header-notifications-trigger">
								<a href="#"><div class="user-avatar status-online">
									@if( Route::has('login'))
	            						@auth
	            							@if(Auth::user()->user_type_id == 1)
	            							@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/freelancer/' . Auth::user()->image)}}" alt="">
											@endif
											@elseif(Auth::user()->user_type_id == 0)
	            							@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
											@endif
											@elseif(Auth::user()->user_type_id ==2)
											@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
											@endif
											@elseif(Auth::user()->user_type_id ==3)
											@if(Auth::user()->image == null)
	            							<img src="{{ asset('images/default.jpeg')}}" alt="">
	            							@else
											<img src="{{ asset('images/employer/' . Auth::user()->image)}}" alt="">
											@endif
											@endif
											@else
											<img src="{{ asset('images/icon/outline_perm_identity_black_24dp.png')}}" alt="">
										@endif
									@endif
								</div></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-online">
											@if( Route::has('login'))
			            						@auth
			            							@if(Auth::user()->user_type_id == 1)
			            							@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/freelancer/' . Auth::user()->image)}}" alt="">
													@endif
													@elseif(Auth::user()->user_type_id == 0)
			            							@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
													@endif
													@elseif(Auth::user()->user_type_id ==2)
													@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/admin/' . Auth::user()->image)}}" alt="">
													@endif
													@elseif(Auth::user()->user_type_id ==3)
													@if(Auth::user()->image == null)
	            										<img src="{{ asset('images/default.jpeg')}}" alt="">
	            									@else
													<img src="{{ asset('images/employer/' . Auth::user()->image)}}" alt="">
													@endif
													@endif
													@else
												<img src="{{ asset('images/icon/outline_perm_identity_black_24dp.png')}}" alt="">
												@endif
												
											@endif
										</div>
										<div class="user-name">
											@if( Route::has('login'))
			            						@auth
			            							@if(Auth::user()->user_type_id == 1)
			            							@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif
													<span>{{__('topbar.Freelancer')}} </span>
													@elseif(Auth::user()->user_type_id == 2)

													@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif 
													<span> {{__('topbar.Admin')}}</span>
													@elseif(Auth::user()->user_type_id == 3)

													@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif
													<span>{{__('topbar.Employer')}}  </span>
													@elseif(Auth::user()->user_type_id == 0)
													@if(Auth::user()->full_name == null)
			            							@if (session()->get('language') == 'arbi')
			            							مجهول
			            							@else 

			            							Unknown

			            							@endif
			            							@else
													{{Auth::user()->full_name}} 
													@endif
													<span>{{__('topbar.Super Admin')}}</span>
													@endif
												@endif
											@endif
											

										</div>
									</div>
									
									<!-- User Status Switcher -->
									<!-- <div class="status-switch" id="snackbar-user-status"> -->
										<!-- <label class="user-online current-status">Online</label>
										<label class="user-invisible">Invisible</label> -->
										<!-- Status Indicator -->
										<!-- <span class="status-indicator" aria-hidden="true"></span>
									</div>	 -->
							</div>
							
							<ul class="user-menu-small-nav">
								
								@if( Route::has('login'))
			            			@auth
			            				<li><a href="{{route('user.dashbord')}}"><i class="icon-material-outline-dashboard"></i> {{__('topbar.Dashboard')}}</a></li>
										<!-- <li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li> -->
										<li>
											<form method="POST" action="{{ route('logout') }}">
									          @csrf

									          <a href="{{ route('logout') }}" class="icon-material-outline-power-settings-new"
									              onclick="event.preventDefault();
									              this.closest('form').submit();">
									              @if (session()->get('language') == 'arbi') تسجيل خروج @else
									              {{__('topbar.Log out')}}
									              @endif
									              
									          </a>
									        </form>
									    </li>
									    @else
									    <li>
											<a href="{{route('login')}}">{{__('topbar.Login')}}</a>
										</li>
							    	@endif
							    	
							    @endif
							    
							</ul>

							</div>
						</div>

					</div>
					<!-- User Menu / End -->

					<!-- Mobile Navigation Button -->
					<span class="mmenu-trigger">
						<button class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</span>


				</div>
				<!-- Right Side Content / End -->

			</div>
		</div>
</header>
@endif
  <!--end language button -->

<div class="dropdown lang-button">
  <button class="btn btn-se dropdown-toggle sidor" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" >
    <img class="flag" style="padding-right: 7px;" src="{{asset('img/output-onlinepngtools.png')}}" alt="">Language
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <!-- <a class="dropdown-item" href="#">English</a>
    <a class="dropdown-item" href="#">Arabic</a>
    <a class="dropdown-item" href="#">Turkish</a> -->
    <li>
										<form action="{{route('changeLang')}}" method="get">
										<input type="hidden" name="lang"value="ar">
										<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/ar.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> Arabic</button>
									</form>
									</li>
									<li>
										<form action="{{route('changeLang')}}" method="get">
										<input type="hidden" name="lang"value="en">
										<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/en_US.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> English</button>
									</form>
									</li>
									<li>
										<form action="{{route('changeLang')}}" method="get">
										<input type="hidden" name="lang"value="tk">
										<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/JamTalentFlags_TurkeyFlag.jpg')}}" alt="" data-tippy-placement="top"> Turkish</button>
									</form>
									</li>
  </div>
</div>
<!-- <div class="btn-group dropup language-button">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
   <img class="flag" src="{{asset('img/output-onlinepngtools.png')}}" alt=""> Language
  </button>
  <div class="dropdown-menu">
		<li>
										<form action="{{route('changeLang')}}" method="get">
										<input type="hidden" name="lang"value="ar">
										<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/ar.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> Arabic</button>
									</form>
									</li>
									<li>
										<form action="{{route('changeLang')}}" method="get">
										<input type="hidden" name="lang"value="en">
										<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/en_US.png')}}" alt="" title="United Kingdom" data-tippy-placement="top"> English</button>
									</form>
									</li>
									<li>
										<form action="{{route('changeLang')}}" method="get">
										<input type="hidden" name="lang"value="tk">
										<button type="submit"  class="changeLang " style="color:black;"><img class="flag" src="{{asset('img/JamTalentFlags_TurkeyFlag.jpg')}}" alt="" data-tippy-placement="top"> Turkish</button>
									</form>
									</li>
  </div>
</div> -->


<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu
                                                                            dropdown-menu-left" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
-->