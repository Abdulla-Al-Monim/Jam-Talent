@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Jam Talent
@endsection
<style type="text/css">
  .ia {
    background-image: url(../img/WhatsApp.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #0000009e;
    background-blend-mode: multiply;
   
    background-position: center;
}
.ia-backgorund {
    background-image: url(../img/arabic-home.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #0000009e;
    background-blend-mode: multiply;
   
    background-position: center;
}
.underline-head::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background: #A5A5A5;
    margin-top: 30px;
   
}
.text-box{
    background: #F5F5F5;
    border: 1px solid #F5F5F5;
    border-radius: 5px;
    padding: 20px;
        box-shadow: 0 0 18px 0 rgb(0 0 0 / 12%);
      }
      myModal.in{
    z-index: 999999999999999999999999999999999999999999999999999999;
}
</style>
@section('body-content')
<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->

</style>


@if(session()->get('locale') == 'ar')	
<div class=" intro-banner" data-background-image="{{asset('img/home-background-Arabic.jpg')}}">
	@else
<div class="intro-banner" data-background-image="{{asset('images/home-background.jpg')}}">
	@endif
	<div class="container">
    <header>
    <div class="container">
      <div class="row align-items-center mx-9">
        <div class="col-12">
          <h1 style="color:#2A41E8;"class="responsive-heading mb-2">{{__('home.Join the world')}}<br> {{__('home.work marketplace')}}</h1>
          <p >{{__('home.Find great talent. Build your business.')}}<br>
              {{__('home.Take your career to the next level.')}}</p>
          <div class="button-grp mt-4">

            <a class="btn-one rounded-pill shadow-none mb-2" target="_blank" style="background-color:#2A41E8; border-color: #2A41E8;" href="{{route('all.freelancer')}}">{{__('home.Find Talent')}}</a>

            <a class="btn-two rounded-pill shadow-none mb-2" target="_blank" style="color:#2A41E8; border-color: #2A41E8;" href="{{route('all.job')}}">{{__('home.Find Work')}}</a>
          </div>
          <!-- <div class="trusted mt-5">
            <p>Trusted by</p>
            <img class="img-fluid" src="{{asset('img/microsoft_logo.png')}}" alt="">
          </div> -->
        </div>
        <!-- <div class="col-4">
          <img class="img-fluid" src="{{asset('img/top.png')}}" alt="">
        </div> -->
      </div>
    </div>
  </header>
		
		<!-- Intro Headline -->
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h1>
						<strong>Hire the top and verified Freelancer Talents to turn your ideas into reality</strong>
					</h1>
          <br>
          <span style="font-size: 16;"><strong class="color">JamTalent</strong> The largest network of top extraordinary freelancers for short term and long-term tasks/jobs marketplace solutions. JamTalent is a perfect solution for individuals or any agency’s to filter out their perfect candidates.</span>
				</div>
			</div>
		</div> -->
		
		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
         <form action="{{route('search.job')}}" method="POST">
            @csrf
				<div class="intro-banner-search-form margin-top-95">

            <!-- Search Field -->
              <div class="intro-search-field with-autocomplete">
                <label for="autocomplete-input" class="field-title ripple-effect">{{__('home.Where')}}?</label>
                <div class="input-with-icon">
                  <input id="autocomplete-input" name="location" type="text" placeholder="{{__('home.Location')}}">
                  <i class="icon-material-outline-location-on"></i>
                </div>
              </div>

              <!-- Search Field -->
              <div class="intro-search-field">
                <label for ="intro-keywords" class="field-title ripple-effect">{{__('home.What job you want')}}?</label>
                <input id="intro-keywords" name="job_title" type="text" placeholder="{{__('home.Job Title')}}">
              </div>

              <!-- Button -->
              <div class="intro-search-button">
                <button class="button ripple-effect" type="submit">{{__('home.Search')}}</button>
              </div>
          

					
				</div>
        </form>
			</div>
		</div>
		<div style="background-color: #007bff; padding-top: 50px;padding-bottom: 50px; margin-top: 10px;" class="container-fluida">
			<div class="row" style="text-align: center;margin-left: 11px;">
				<div class="col-md-8">
					<h2 style="text-align: center; color: white; font-size: 24px;">{{__('home.Get in-demand talent
on demand.')}}{{__('home.You’re on your way to 
connecting with great!
 talent')}}
</h2>
				</div>
				<div class="col-md-4 mt-2"> 
					<a href="{{route('all.freelancer')}}" target="_blank" class="btn" style="color:blue;background-color: #fff;">{{__('home.Find top talents')}} </a>
				</div>
			</div>
			
		</div>
		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
            @php 
            $count = App\Models\Backend\Job::orderBy('id','asc')->count();
            @endphp
						<strong class="counter">{{$count}}</strong>
						<span>{{__('backendIndex.Jobs Posted')}}</span>
					</li>
					<li>
            @php 
            $count = App\Models\Backend\Task::orderBy('id','asc')->count();
            @endphp
						<strong class="counter">{{$count}}</strong>
						<span>{{__('backendIndex.Tasks Posted')}}</span>
					</li>
					<li>
            @php 
              $count = App\Models\User::orderBy('id','asc')->where('user_type_id',1)->count();
            @endphp
						<strong class="counter">{{$countFreelancer}}</strong>
						<span>{{__('backendIndex.Freelancers')}}</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>
<!-- Content
================================================== -->

<div class="section">
  
  <!--start section build amazing -->

    <div class="container py-5 my-5">
      <div class="mb-5">
        <h1 class="text-center fs-1">{{__('home.Build Amazing Teams, 
On Demand')}}</h1>
        <p class="text-center">{{__('home.Quickly assemble the teams you need, exactly when you need them.')}}</p>
      </div>
      <div class="row align-items-center">

        <div class="col-md-6 col-12 media-1">
          <div class="row">
            <div class="col-md-6 col-sm-12 mb-4">
              <div class="sec-hvr p-3">
                 <a href="#" target="_blank">
                            <img src="{{asset('images/HireQuickly.svg')}}" style="width: 38px;" alt="arrow" class="img-fluid icon_size py-2">
                        </a>
                          <h3 class="py-2"><strong>{{__('home.Hire Quickly')}}</strong></h3>
                          <p class="sec-hvr py-2 sec-p">{{__('home.Immediately, we will 
introduce you to the 
perfect talent for 
your project. Average 
time to match is less 
than 24 hours.')}}</p>
            </div>
             </div>
                 

                <div class="col-md-6 col-sm-12 mb-4">
                  <div class="sec-hvr p-3">
                    <a href="#" target="_blank">
                                    <img src="{{asset('images/Prebuiltourexpertteam.svg')}}" alt="file" class="img-fluid icon_size py-2">
                                </a>
                                <h3 class="py-2"><strong>{{__('home.Prebuilt our expert 
team')}}</strong> </h3>
                                <p class="sec-hvr py-2 sec-p">{{__('home.A professional expert 
on our team will work 
with you to understand 
your goals, technical 
needs, and team 
dynamics.')}}</p>
                </div>
                </div>


                <div class="col-md-6 col-sm-12">
                  <div class="sec-hvr p-3">
                    <a href="#" target="_blank">
                                          <img src="{{asset('images/Shortlongtermprojects.svg')}}" alt="statistics" class="img-fluid icon_size py-2">
                                      </a>
                                      <h3 class="py-2"><strong>{{__('home.Short/long term 
projects')}}</strong> </h3>
                                      <p class="sec-hvr py-2 sec-p">{{__('home.Work with diverse new 
team member in a 
short and long term 
projects, and hire 
qualified freelancers to ensure you hire the right people for the job.')}}</p>
                  </div>
                </div>


                  <div class="col-md-6 col-sm-12">
                    <div class="sec-hvr p-3">
                    <a href="#" target="_blank">
                                        <img src="{{asset('images/Buildorhireexpertteam.svg')}}" alt="signal" class="img-fluid icon_size py-2">
                                    </a>
                                    <h3 class="py-2"><strong>{{__('home.Build or hire expert 
team')}}</strong> </h3>
                                    <p class=" sec-hvr py-2 sec-p">{{__('home.Just post your job 
for a team or 
individual and make 
you job done fast and 
easy but very excellent.')}}</p>
                  </div>
                </div>
          </div>
        </div>

              <div class="col-md-6 col-12">
                <img src="{{asset('images/office-1209640_1920.jpg')}}"  class="img-fluid py-2" style="padding-top: 80px;">
              </div>
              
            
          


    </div>

    <!--end section build amazing -->
</div>




<!-- our consulting services start  -->
<section class="our-consulting-services">
  <div class="container text-center">
    <h1 class="pb-4 underline">{{__('home.Easy Hiring')}}</h1>
  </div>
  <div class="three-collum">
    <div class="container">
      <div class="row align-items-center px-5 mt-5">
        <div class="col-lg-4 col-12 text-center p-0">
          <div class="collum-one shadow">
            <h1 class="text-light my-2">{{__('home.Post Jobs')}} <br> {{__('home.Or')}} <br>{{__('home.Tasks')}} </h1>
            <p>{{__('home.It is a simple process of posting jobs/tasks and gets rapid job application for your jobs')}}</p>
            <!-- <a class="btn btn-outline-light text-primary bg-white my-2" href="#" role="button">LEARN MORE</a> -->
          </div>
        </div>
        <div class="col-lg-4 col-12 text-center p-0">
          <div class="collum-two shadow">
            <h1 class="text-light my-2">{{__('home.Choose Perfect Bidders')}}</h1>
            <p>{{__('home.You can simply browse from among 
the top skilled freelancers or choose
 you candidates from the bidders 
from your job posting.')}}</p>
            <!-- <a class="btn btn-outline-light text-primary bg-white my-2" href="#" role="button">LEARN MORE</a> -->
          </div>
        </div>
        <div class="col-lg-4 col-12 text-center p-0">
          <div class="collum-three shadow">
            <h1 class="text-dark my-2">{{__('home.Secured Payment System')}}</h1>
            <p>{{__('home.We offer both employer 
and freelancer have 
security of their 
payment and the 
payment will be done 
only after the work 
is successfully done.')}}</p>
            <!-- <a class="btn btn-outline-light text-primary bg-white my-2" href="#" role="button">LEARN MORE</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>

</section>


<!-- Features Jobs -->
<div class="section gray compact-list-layout">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>{{__('home.Featured Jobs')}}</h3>
					<a href="{{route('all.job')}}"  class="headline-link">{{__('home.Browse All Jobs')}}</a>
				</div>
				
				<!-- Jobs Container -->
				<div class="listings-container compact-list-layout margin-top-35">
					@foreach(App\Models\Backend\Job::orderBy('id','asc')->where('status',1)->where('freelancer_id',null)->get()->take(5) as $job)

          @php 
            $employer = App\Models\User::where('id',$job->user_id)->first();
          @endphp
					<!-- Job Listing -->
					<a href="{{route('job.show',$job->id)}}" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
                @if($employer  !== null)
                  @if($employer->image == null)
    							<img src="{{ asset('images/default.jpeg')}}" alt="">
                  @else
                  <img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
                  @endif
                @endif
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">{{$job->job_title}}</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i> 
                      @if($employer  !== null)
                        @if($employer->full_name == null)
                        Unknown
                        @else
                        {{$employer->full_name}}
                        @endif
                        @endif 
                      <div class="verified-badge" title="Verified Employer" data-tippy-placement="top"></div></li>
										<li><i class="icon-material-outline-location-on"></i> {{$job->location}}</li>
										<li><i class="icon-material-outline-business-center"></i> {{$job->type}}</li>
										<li><i class="icon-material-outline-access-time"></i> {{$job->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							
						</div>
					</a>
					@endforeach

				</div>
				<!-- Jobs Container / End -->

			</div>
		</div>
	</div>
</div>
<!-- Featured Jobs / End -->
<!-- Features Tasks -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>{{__('home.Featured Task')}}</h3>
					<a href="{{route('all.Task')}}" class="headline-link">{{__('home.Browse All Task')}}</a>
				</div>
				
				<!-- Tasks Container -->
				<div class="listings-container compact-list-layout margin-top-35">
					@foreach(App\Models\Backend\Task::orderBy('id','asc')->where('status',1)->where('freelancer_id',null)->get()->take(5) as $task)
          @php 
            $employer = App\Models\User::where('id',$task->employer_id)->first();
          @endphp
					<!-- Task Listing -->
					<a href="{{route('task.show',$task->id)}}" class="job-listing with-apply-button">

						<!-- Task Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
                @if($employer->image == null)
								<img src="{{ asset('images/default.jpeg')}}" alt="">
                @else
                <img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
                @endif
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">{{$task->task_name}}</h3>

								<!-- Task Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i>
                      @if($employer->full_name == null)
                      Unknown
                      @else
                      {{$employer->full_name}}
                      @endif
                     <div class="verified-badge" title="Verified Employer" data-tippy-placement="top"></div></li>
										<li><i class="icon-material-outline-location-on"></i> {{$task->location}}</li>
										<li><i class="icon-material-outline-business-center"></i> {{$task->category_name}}</li>
										<li><i class="icon-material-outline-access-time"></i> {{$task->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">{{__('home.Apply Now')}}</span>
						</div>
					</a>
					@endforeach

				</div>
				<!-- Jobs Container / End -->

			</div>
		</div>
	</div>
</div>
<!-- Featured Task / End -->

<!-- Features Cities -->
<div class="section margin-top-65 margin-bottom-65">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>{{__('home.Our Franchise Cities')}}</h3>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="{{asset('images/city/EmiratestowerDubaiUAE.jpg')}}">
					<div class="photo-box-content">
						<h3>{{__('home.Dubai')}}</h3>
						<!-- <span>376 Jobs</span> -->
					</div>
				</a>
			</div>
			
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="{{asset('images/city/BrosporousistanbulTurkey.jpg')}}">
					<div class="photo-box-content">
						<h3>{{__('home.Istanbul')}}</h3>
						<!-- <span>645 Jobs</span> -->
					</div>
				</a>
			</div>
			
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="{{asset('images/city/CapitalbusinessparkCairoEgypt.jpg')}}">
					<div class="photo-box-content">
						<h3>{{__('home.Cairo')}}</h3>
						<!-- <span>832 Jobs</span> -->
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="{{asset('images/city/MadinaroadJeddahSaudiArabia.jpg')}}">
					<div class="photo-box-content">
						<h3>{{__('home.Riyadh')}}</h3>
						<!-- <span>513 Jobs</span> -->
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- Features Cities / End -->


<!-- Highest Rated Freelancers -->
<div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-25">
					<h3>{{__('home.Highest Rated 
Freelancers')}}</h3>
					<a href="{{route('all.freelancer')}}" class="headline-link">{{__('home.Browse All Freelancers')}}</a>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="default-slick-carousel freelancers-container freelancers-grid-layout">

					<!--Freelancer -->
					@foreach($highRatedUsers as $highRatedFreelancer)
					@php
					$orderComplete = App\Models\Backend\Order::where('freelancer_id', $highRatedFreelancer->id)->where('status',3)->count();
                      
					@endphp
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
                @if( Route::has('login'))
                  @auth
                    @if( Auth::user()->user_type_id == 3 )
								
								<!-- Bookmark Icon -->

								      <!-- <span class=""><span class="icon-material-baseline-star-border bookmark" style=""></span></span> -->
                      @php
                      $count = App\Models\Backend\BookMarkFreelancer::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('freelancer_id',$highRatedFreelancer->id)->count();
                      @endphp
                      
                      @if($count == 0)
                      
                      <form action="{{route('bookmark.freelancer',$highRatedFreelancer->id)}}" method="POST">
                        @csrf
                        <button class="icon-material-baseline-star-border bookmark" type="submit"></button>
                      </form>
                      
                      @else
                      @foreach(App\Models\Backend\BookMarkFreelancer::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('freelancer_id',$highRatedFreelancer->id)->get() as $bookMark)
                      <form action="{{route('bookmark.freelancer.remove',$bookMark->id)}}" method="POST">
                        @csrf
                        <button class="icon-material-baseline-star-border bookmark backgroundColor" type="submit"></button>
                      </form>
                        @endforeach
                      @endif
                    @endif
                  @endif
                @endif
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<div class="verified-badge"></div>
									<a href="{{route('single.freelancer.profile',$highRatedFreelancer->id)}}" target="_blank">
                    @if($highRatedFreelancer->image == null)
                    <img src="{{ asset('images/default.jpeg')}}" alt="">
                    @else
                    <img src="{{ asset('images/freelancer/' . $highRatedFreelancer->image)}}" alt="">
                    @endif
                  </a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="{{route('single.freelancer.profile',$highRatedFreelancer->id)}}" target="_blank"> 
                    @if($highRatedFreelancer->full_name == null)
                    Unknown
                    @else
                    {{$highRatedFreelancer->full_name}} 
                    @endif
                     @if($highRatedFreelancer->location == 'AR')
                    <img class="flag" src="{{asset('images/flags/ar.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'AM')
                    <img class="flag" src="{{asset('images/flags/am.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'AW')
                    <img class="flag" src="{{asset('images/flags/aw.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'AU')
                    <img class="flag" src="{{asset('images/flags/au.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'AT')
                    <img class="flag" src="{{asset('images/flags/at.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'AZ')
                    <img class="flag" src="{{asset('images/flags/az.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BS')
                    <img class="flag" src="{{asset('images/flags/bs.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BH')
                    <img class="flag" src="{{asset('images/flags/bh.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BD')
                    <img class="flag" src="{{asset('images/flags/bd.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BB')
                    <img class="flag" src="{{asset('images/flags/bb.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BY')
                    <img class="flag" src="{{asset('images/flags/by.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BE')
                    <img class="flag" src="{{asset('images/flags/be.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BZ')
                    <img class="flag" src="{{asset('images/flags/bz.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BJ')
                    <img class="flag" src="{{asset('images/flags/bj.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BM')
                    <img class="flag" src="{{asset('images/flags/bm.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BT')
                    <img class="flag" src="{{asset('images/flags/bt.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BG')
                    <img class="flag" src="{{asset('images/flags/bg.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'BF')
                    <img class="flag" src="{{asset('images/flags/bf.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">


                    @elseif($highRatedFreelancer->location == 'BI')
                    <img class="flag" src="{{asset('images/flags/bi.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'KH')
                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CM')
                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CA')
                    <img class="flag" src="{{asset('images/flags/ca.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CV')
                    <img class="flag" src="{{asset('images/flags/cv.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'KY')
                    <img class="flag" src="{{asset('images/flags/ky.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CO')
                    <img class="flag" src="{{asset('images/flags/co.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'KM')
                    <img class="flag" src="{{asset('images/flags/km.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CG')
                    <img class="flag" src="{{asset('images/flags/cg.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CK')
                    <img class="flag" src="{{asset('images/flags/ck.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">

                    @elseif($highRatedFreelancer->location == 'CR')
                    <img class="flag" src="{{asset('images/flags/cr.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CI')
                    <img class="flag" src="{{asset('images/flags/ci.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'HR')
                    <img class="flag" src="{{asset('images/flags/hr.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CR')
                    <img class="flag" src="{{asset('images/flags/cr.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CU')
                    <img class="flag" src="{{asset('images/flags/cu.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CW')
                    <img class="flag" src="{{asset('images/flags/cw.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CY')
                    <img class="flag" src="{{asset('images/flags/cy.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CZ')
                    <img class="flag" src="{{asset('images/flags/cz.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'DK')
                    <img class="flag" src="{{asset('images/flags/dk.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'DJ')
                    <img class="flag" src="{{asset('images/flags/dj.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">@elseif($highRatedFreelancer->location == 'DM')
                    <img class="flag" src="{{asset('images/flags/dm.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'DO')
                    <img class="flag" src="{{asset('images/flags/do.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'EC')
                    <img class="flag" src="{{asset('images/flags/ec.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'EG')
                    <img class="flag" src="{{asset('images/flags/eg.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CR')
                    <img class="flag" src="{{asset('images/flags/cr.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GP')
                    <img class="flag" src="{{asset('images/flags/gp.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GU')
                    <img class="flag" src="{{asset('images/flags/gu.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GT')
                    <img class="flag" src="{{asset('images/flags/gt.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GG')
                    <img class="flag" src="{{asset('images/flags/gg.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GN')
                    <img class="flag" src="{{asset('images/flags/gn.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GW')
                    <img class="flag" src="{{asset('images/flags/gw.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GY')
                    <img class="flag" src="{{asset('images/flags/gy.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'HT')
                    <img class="flag" src="{{asset('images/flags/ht.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'HN')
                    <img class="flag" src="{{asset('images/flags/hn.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'HK')
                    <img class="flag" src="{{asset('images/flags/hk.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'HU')
                    <img class="flag" src="{{asset('images/flags/hu.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">@elseif($highRatedFreelancer->location == 'IS')
                    <img class="flag" src="{{asset('images/flags/is.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'IN')
                    <img class="flag" src="{{asset('images/flags/in.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'ID')
                    <img class="flag" src="{{asset('images/flags/id.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'NO')
                    <img class="flag" src="{{asset('images/flags/no.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'OM')
                    <img class="flag" src="{{asset('images/flags/om.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PK')
                    <img class="flag" src="{{asset('images/flags/pk.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PA')
                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PG')
                    <img class="flag" src="{{asset('images/flags/pg.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PY')
                    <img class="flag" src="{{asset('images/flags/py.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PE')
                    <img class="flag" src="{{asset('images/flags/pk.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PH')
                    <img class="flag" src="{{asset('images/flags/ph.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PN')
                    <img class="flag" src="{{asset('images/flags/pn.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PL')
                    <img class="flag" src="{{asset('images/flags/pl.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'PT')
                    <img class="flag" src="{{asset('images/flags/pt.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'QA')
                    <img class="flag" src="{{asset('images/flags/qa.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'RE')
                    <img class="flag" src="{{asset('images/flags/re.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'RO')
                    <img class="flag" src="{{asset('images/flags/ro.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'RU')
                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'RW')
                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'SZ')
                    <img class="flag" src="{{asset('images/flags/sz.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'SE')
                    <img class="flag" src="{{asset('images/flags/se.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'CH')
                    <img class="flag" src="{{asset('images/flags/ch.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">@elseif($highRatedFreelancer->location == 'TR')
                    <img class="flag" src="{{asset('images/flags/tr.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'TM')
                    <img class="flag" src="{{asset('images/flags/tm.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'TV')
                    <img class="flag" src="{{asset('images/flags/tv.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'UA')
                    <img class="flag" src="{{asset('images/flags/ua.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'GB')
                    <img class="flag" src="{{asset('images/flags/gb.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'US')
                    <img class="flag" src="{{asset('images/flags/us.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'UY')
                    <img class="flag" src="{{asset('images/flags/uy.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'UZ')
                    <img class="flag" src="{{asset('images/flags/uz.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'YE')
                    <img class="flag" src="{{asset('images/flags/ye.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'ZM')
                    <img class="flag" src="{{asset('images/flags/zm.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'ZW')
                    <img class="flag" src="{{asset('images/flags/zw.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'LB')
                    <img class="flag" src="{{asset('images/flags/libya.svg')}}" alt="" title="Libya" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'Palestine')
                    <img class="flag" src="{{asset('images/flags/Palestine-Flag.svg')}}" alt="" title="Libya" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'Emirates')
                    <img class="flag" src="{{asset('images/flags/Emirates-flag.svg')}}" alt="" title="Emirates" data-tippy-placement="top">
                    @elseif($highRatedFreelancer->location == 'Syria')
                    <img class="flag" src="{{asset('images/flags/Syria-Flag.svg')}}" alt="" title="Syria" data-tippy-placement="top">
                    @endif
                    </a></h4>
									<span>{{$highRatedFreelancer->sort_description}}</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="{{$highRatedFreelancer->freelancerActivity->average_rating}}"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>{{$highRatedFreelancer->sort_description}}
                    @if($highRatedFreelancer->location == 'AR')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Argentina
                   </strong>
                    @elseif($highRatedFreelancer->location == 'AM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Armenia
                   </strong>

                    @elseif($highRatedFreelancer->location == 'AW')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Aruba
                   </strong>

                    @elseif($highRatedFreelancer->location == 'AU')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Australia
                   </strong>

                    @elseif($highRatedFreelancer->location == 'AT')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Austria
                   </strong>

                    @elseif($highRatedFreelancer->location == 'AZ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Azerbaijan
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BS')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Bahamas
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BH')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Bahrain
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BD')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Bangladesh
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BB')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Barbados
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BY')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Belarus
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BE')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Belgium
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BZ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Belize
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BJ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Benin
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Bermuda
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BT')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Bhutan
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BG')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Bulgaria
                   </strong>

                    @elseif($highRatedFreelancer->location == 'BF')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Burkina Faso
                   </strong>


                    @elseif($highRatedFreelancer->location == 'BI')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Burundi
                   </strong>

                    @elseif($highRatedFreelancer->location == 'KH')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cambodia
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cameroon
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CA')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Canada
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CV')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cape Verde
                   </strong>

                    @elseif($highRatedFreelancer->location == 'KY')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cayman Islands
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CO')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Colombia
                   </strong>

                    @elseif($highRatedFreelancer->location == 'KM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Comoros
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CG')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Congo
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CK')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cook Islands
                   </strong>

                    @elseif($highRatedFreelancer->location == 'CR')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Costa Rica
                   </strong>
                    @elseif($highRatedFreelancer->location == 'CI')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Côte d'Ivoire
                   </strong>
                    @elseif($highRatedFreelancer->location == 'HR')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Croatia
                   </strong>
                 
                    @elseif($highRatedFreelancer->location == 'CU')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cuba
                   </strong>
                    @elseif($highRatedFreelancer->location == 'CW')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Curaçao
                   </strong>
                    @elseif($highRatedFreelancer->location == 'CY')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Cyprus
                   </strong>
                    @elseif($highRatedFreelancer->location == 'CZ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Czech Republic
                   </strong>
                    @elseif($highRatedFreelancer->location == 'DK')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Denmark
                   </strong>
                    @elseif($highRatedFreelancer->location == 'DJ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Djibouti
                   </strong>@elseif($highRatedFreelancer->location == 'DM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Dominica
                   </strong>
                    @elseif($highRatedFreelancer->location == 'DO')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Dominican Republic
                   </strong>
                    @elseif($highRatedFreelancer->location == 'EC')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Ecuador
                   </strong>
                    @elseif($highRatedFreelancer->location == 'EG')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Egypt
                   </strong>
                  
                 
                    @elseif($highRatedFreelancer->location == 'GP')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guadeloupe
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GU')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guam
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GT')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guatemala
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GG')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guernsey
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GN')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guinea
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GW')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guinea-Bissau
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GY')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Guyana
                   </strong>
                    @elseif($highRatedFreelancer->location == 'HT')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Haiti
                   </strong>
                    @elseif($highRatedFreelancer->location == 'HN')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Honduras
                   </strong>
                    @elseif($highRatedFreelancer->location == 'HK')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Hong Kong
                   </strong>
                    @elseif($highRatedFreelancer->location == 'HU')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Hungary
                   </strong>@elseif($highRatedFreelancer->location == 'IS')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Iceland
                   </strong>
                    @elseif($highRatedFreelancer->location == 'IN')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     India
                   </strong>
                    @elseif($highRatedFreelancer->location == 'ID')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Indonesia
                   </strong>
                    @elseif($highRatedFreelancer->location == 'NO')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Norway
                   </strong>
                    @elseif($highRatedFreelancer->location == 'OM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Oman
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PK')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Pakistan
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PA')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Panama
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PG')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Papua New Guinea
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PY')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Paraguay
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PE')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Peru
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PH')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Philippines
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PN')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Pitcairn
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PL')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Poland
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PT')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Portugal
                   </strong>
                    @elseif($highRatedFreelancer->location == 'QA')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Qatar
                   </strong>
                    @elseif($highRatedFreelancer->location == 'RE')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Réunion
                   </strong>
                    @elseif($highRatedFreelancer->location == 'RO')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Romania
                   </strong>
                    @elseif($highRatedFreelancer->location == 'RU')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Russian Federation
                   </strong>
                    @elseif($highRatedFreelancer->location == 'RW')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Rwanda
                   </strong>
                    @elseif($highRatedFreelancer->location == 'SZ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Swaziland
                   </strong>
                    @elseif($highRatedFreelancer->location == 'SE')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Sweden
                   </strong>
                    @elseif($highRatedFreelancer->location == 'CH')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Switzerland
                   </strong>@elseif($highRatedFreelancer->location == 'TR')
                   <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Turkey
                   </strong>
                    @elseif($highRatedFreelancer->location == 'TM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Turkmenistan
                   </strong>
                    @elseif($highRatedFreelancer->location == 'TV')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Tuvalu
                   </strong>
                    @elseif($highRatedFreelancer->location == 'UA')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Ukraine
                   </strong>
                    @elseif($highRatedFreelancer->location == 'GB')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     United Kingdom
                   </strong>
                    @elseif($highRatedFreelancer->location == 'US')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     United States
                   </strong>
                    @elseif($highRatedFreelancer->location == 'UY')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Uruguay
                   </strong>
                    @elseif($highRatedFreelancer->location == 'UZ')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Uzbekistan
                   </strong>
                    @elseif($highRatedFreelancer->location == 'YE')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Yemen
                   </strong>
                    @elseif($highRatedFreelancer->location == 'ZM')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Zambia
                   </strong>
                    @elseif($highRatedFreelancer->location == 'PW')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Palau
                   </strong>
                   @elseif($highRatedFreelancer->location == 'PR')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Puerto Rico
                   </strong>
                   @elseif($highRatedFreelancer->location == 'UG')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Uganda
                   </strong>
                   @elseif($highRatedFreelancer->location == 'LB')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Libya
                   </strong>
                   @elseif($highRatedFreelancer->location == 'Syria')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Syria
                   </strong>
                   @elseif($highRatedFreelancer->location == 'Emirates')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     United Arab Emirates
                   </strong>
                   @elseif($highRatedFreelancer->location == 'Palestine')
                    <strong>
                    <i class="icon-material-outline-location-on">
                      
                    </i>
                     Palestine
                   </strong>

                    @endif
                  
                    
                  </li>
									<li>{{__('home.Rate')}} <strong>{{$highRatedFreelancer->hourly_rate}} / hr</strong></li>
									<li>{{__('home.Order Complete')}} <strong>
									{{$orderComplete}}
								</strong></li>
								</ul>
							</div>
							<a href="{{route('single.freelancer.profile',$highRatedFreelancer->id)}}" class="button button-sliding-icon ripple-effect">{{__('home.View Profile')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->
					@endforeach


				</div>
			</div>

		</div>
	</div>
</div>
<!-- Highest Rated Freelancers / End-->
<div class="section padding-top-60 padding-bottom-75">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-35">
					<h3>{{__('home.Membership Plans')}}</h3>
				</div>
			</div>


			<div class="col-xl-12">

				<!-- Billing Cycle  -->
				<div class="billing-cycle-radios margin-bottom-70">
					<div class="radio billed-monthly-radio">
						<!-- <input id="radio-5" name="radio-payment-type" type="radio" checked=""> -->
						<label for="radio-5"><span class="radio-label"></span>{{__('home.Billed Monthly')}} </label>
					</div>
<!-- 
					<div class="radio billed-yearly-radio">
					
						<label for="radio-6"><span class="radio-label"></span> Billed Yearly <span class="small-label">Save 10%</span></label>
					</div> -->
				</div>

				<!-- Pricing Plans Container -->
				<div class="pricing-plans-container" >
          <div class="row">
            
              @foreach( App\Models\Backend\MembershipPlan::orderBy('id','asc')->get() as $membership)
          <!-- Plan -->
          <div class="col-md-4 col-12">
          <div class="pricing-plan text-box">
            <div class="">
              @if($membership->plan_name === "Basic")
              <div class=" text-center pricing-plan-label billed-monthly-label text-light " style="padding: 20px 0px; background: #d16fa9;">
                 <div >
                  <h3 class="text-light">
                          {{__('superAdminMembershipPlan.Basic')}}
                    
                  </h3>
                  <p class="text-light"><em>{{__('home.For Employers')}}</em></p>
                </div>
              </div>
              @elseif($membership->plan_name === "Standard")
              <div class=" text-center pricing-plan-label billed-monthly-label text-light" style="padding: 20px 0px; background: #f1a51c;">
                 <div >
                  <h3 class="text-light">
                           {{__('superAdminMembershipPlan.Standard')}}
                    
                  </h3>
                  <p class="text-light"><em>{{__('home.For Agencies')}}</em></p>

                </div>
              </div>
              @else
              <div class="text-center pricing-plan-label billed-monthly-label text-light" style="padding: 20px 0px; background: #52a9da;">
                 <div >
                  <h3 class="text-light">
                          {{__('superAdminMembershipPlan.Extended')}}
                    
                  </h3>
                  <p class="text-light"><em>{{__('home.For HR Departments')}}</em></p>
                </div>
              </div>
              @endif
            </div>
           

            
              
            <p class="margin-top-10">
              @if(session()->get('locale') == 'ar')
              {!!$membership->s_desc_ar!!}
              @elseif(session()->get('locale') == 'tk')
              {!!$membership->s_desc_tr!!}
              @else
              {!!$membership->s_desc!!}
              @endif
              
            </p>
            @if($membership->plan_name === "Basic")

            <div class="pricing-plan-label billed-monthly-label text-light" style="background: #d16fa9;" ><strong  class="text-light">$ {{ $membership->rate}}</strong><br><!-- {{__('home.First Month Free Trial')}} -->
              {{__('home.Get Jobs done cheaper & faster')}}
            </div>
            @elseif($membership->plan_name === "Standard")
            <div class="pricing-plan-label billed-monthly-label text-light" style="background: #f1a51c;" ><strong  class="text-light">$ {{ $membership->rate}}</strong><br><!-- {{__('home.First Month Free Trial')}} -->
              {{__('home.Create your own online digital agency')}}
            </div>
            @else
             <div class="pricing-plan-label billed-monthly-label text-light" style="background: #52a9da;" ><strong  class="text-light">$ {{ $membership->rate}}</strong><br><!-- {{__('home.First Month Free Trial')}} -->
              
              {{__('home.Hire top talents on demand')}}
            </div>
            @endif
            <div class="pricing-plan-label billed-yearly-label"><strong>$205</strong>/ yearly</div>
            <div class="pricing-plan-features">
              @if(session()->get('locale') == 'ar')
              {!!$membership->desc_ar!!}
              @elseif(session()->get('locale') == 'tk')
              {!!$membership->desc_tr!!}
              @else
              {!!$membership->desc!!}
              @endif
            </div>
            @if( Route::has('login'))
               @auth
                  @if( Auth::user()->user_type_id == 3 )
                     @php
                        $count = App\Models\Backend\Checkout::orderBy('id','asc')->where('user_id',Auth::user()->id)->count();
                     @endphp
                      @if($count > 0)
                        @php
                          $checkout = App\Models\Backend\Checkout::where('user_id',Auth::user()->id)->first();
                          @endphp
                            @if($checkout->expired_date > Carbon\Carbon::now())
                              <a href="{{route('checkout.already')}}" target="_blank" class="button full-width margin-top-20">Buy now</a>
                            @else
                            <a href="{{route('checkout.edit',$membership->id)}}" class="button full-width margin-top-20" target="_blank">{{__('home.First Month Free Trial')}}</a>
                            @endif
                      @else
                      <a href="{{route('checkout',$membership->id)}}" class="button full-width margin-top-20" >{{__('home.First Month Free Trial')}}</a>     
                    @endif
          
                  @else
                    <a href="{{route('checkout.alert')}}" class="button full-width margin-top-20">{{__('home.First Month Free Trial')}}</a>
                  @endif
                @else
              <a href="{{route('checkout.alert')}}" class="button full-width margin-top-20">{{__('home.First Month Free Trial')}}</a>
            @endif
          
          
          @endif
          </div>
            </div>
        @endforeach
            </div>
          
					
					</div>
          <!-- <section class="container fifth-section text-dark">
            <div class="row">
              <div class="col-12 text-center" style="margin-bottom: 50px;">
                <h1 class="responsive-heading">{{__('home.What theyre saying')}}</h1>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="cards ms-auto me-4" s>
                  <img class="img-fluid rounded" src="{{asset('img/card-2.png')}}" alt="">
                  <h3 class="my-5 text-box text-dark">"{{__('home.Hire the Top 3% of Freelancers and Talents. 
Jam Talent is an exclusive platform for the top freelance software developers, designers, finance experts, product managers, and project managers in the world. Top companies hire Jam Talent freelancers for their most important projects.')}}"</h3>
                  <hr>
                  
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                
                <div class="cards">
                  <img class="img-fluid rounded" src="{{asset('img/iamge-4.png')}}" alt="">
                  <h3 class="my-5 text-box text-dark">"{{__('home.Our Clients
Jam Talent connects elite talent with the most exciting companies in the world, including leading Fortune 500 brands and innovative Silicon Valley startups. Our focus on challenging, tier-one projects powers the world’s largest high-skilled workforce.')}}"</h3>
                  <hr>
                  

              </div>
              </div>
                
              </div>
              
            </div>
          </section> -->
          <!-- what is jamtalent section -->
       <section class="container-fluid forth-section rounded">
          <div class="row">
            <div class="col-md-6 col-sm-12 p-0 rounded-start col-x-6">
              <img class="img-fluid" src="{{asset('img/ls.png')}}" alt="">
            </div>
          <div class="col-12 forth-background rounded-end col-sm-12 col-x-6 col-md-6" style="background: #1F58C3!important;">

             <h3>{{__('home.For talent')}}</h3>
            <h1 class="responsive-heading">{{__('home.Find flexible work')}}  </h1>
            <p>{{__('home.Meet clients youre 
excited to work with 
and take')}}<br>{{__('home.your career or business
to new heights.')}}.</p> 
             <hr> 
             <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                <p>{{__('home.Find opportunities for 
every stage of your 
freelance career')}}</p>
              </div>
              <div class="col-md-6 col-sm-6 col-6">
                <p>{{__('home.Control when , where and how you work')}}</p>
              </div>
              <div class="col-12">
                <p>{{__('home.Explore different ways to earn')}} </p>
              </div>
              
             <a class="btn btn-light rounded-pill px-4 mt-3" target="_blank" style="border-radius:10px; padding: 0px 0px; " href="{{route('all.Task')}}">{{__('home.Find Opportunities')}}</a> 
            
          </div> 
      </div>
    </section>
    <section class="container-fluid forth-section rounded">
          <div class="row">
            <div class="col-md-6 col-sm-12 p-0 rounded-start col-x-6">
              <img class="img-fluid" src="{{asset('img/M.jpeg')}}" alt="">
            </div>
          <div class="col-12 forth-background rounded-end col-sm-12 col-x-6 col-md-6" style="background: #15A802!important;">

             <h3>{{__('home.For Employers')}}</h3>
            <h1 class="responsive-heading"> {{__('home.Find Talent on-demand')}} </h1>
            <p>{{__('home.Work with the largest network of independent professionals and get things done—from quick turnarounds to big transformations.')}}</p> 
             <hr> 
             <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                <p>{{__('home.Hire a pro
for any skill')}}</p>
              </div>
              <div class="col-md-6 col-sm-6 col-6">
                <p>{{__('home.Complete projects before the deadlines')}}</p>
              </div>
              <div class="col-12">
                <p> {{__('home.Discover Top 3% of Talents')}} <br> {{__('home.& Freelancers')}}</p>
              </div>
              
             <a class="btn btn-light rounded-pill px-4 mt-3" style="border-radius:10px; padding: 0px 0px; " href="{{route('all.freelancer')}}">{{__('home.Hire Professionals')}}</a> 
            
          </div> 
      </div>
    </section>
  	

    <!--end section what a toptal -->

				</div>

			</div>

		</div>
	</div>
</div>
<!-- <section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center" style="padding: 0px ">
					<h1 class="underline pb-4 ">Build Your Career</h1>
					
				</div>
				
			</div>
			<div class="col-md-12">
				<div class="text-center" style="padding: 0px 60px;">
					<h1 style="padding: 40px 0px;">Guaranteed Jobs for All of Our Talents</h1>
					<h3 style="padding-bottom:30px;">Our Internship, Apprenticeship, And Scholarship programs are built in partnership with the world’s most innovative tech companies and sponsored by industry leaders. Whether you're just starting out, upskilling, or looking for a career change - there's an career development program for everyone.</h3>
				</div>
			</div>
		</div>
	</div>
</section> -->

<section style="background-color: transparent;
    background-image: linear-gradient(
140deg, #ebb0e7 0%, #2642D3 100%);">
	<div style="background-color: #ebb0e7;
	    /*opacity: 0.03;*/
	    mix-blend-mode: luminosity;
	    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;">
		<div class="container slick-track" style="    ">
			<div class="row">
				<div class="col-md-12">
					<div class="mb-5 padding-top-45 ">
		        <h1 class="text-center fs-1">{{__('home.From Job Search')}}</h1>
		        <h1 class="text-center fs-1">{{__('home.To Job Success...')}}</h1>
		        <p class="text-center padding-top-45 padding-bottom-45">{{__('home.Free training and resources to help you learn new skills, find job opportunities, and grow your career.')}}</p>
		        <div class="slick-track text-center">
		        	<a href="{{route('apply.index')}}" target="_blank" class="button">{{__('home.Apply Now')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
		        </div> 
		        
		      </div>
				</div
			></div>
		</div>
	</div>
	
</section>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->


<section class="section gray margin-top-45 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 ">
				<div class="compact-list-layout listings-container">
					
				
				<!-- <section class="text-center margin-top-45 margin-botto">
					<h1>Partner Employers</h1>
					<p>We are powered by industry…</p>
				</section> -->
				<div class="mb-5 padding-top-45">
	        <h1 class="text-center fs-1">{{__('home.Partner Employers')}}</h1>
	        <p class="text-center">{{__('home.We are powered by industry…')}}</p>
	      </div>
				<section class="">
				  <!-- <div class="container"> -->
				    <div class="row align-items-center">
					      <div class="col-md-3 col-6 padding-20 "style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		<img src="{{asset('img/jam/Jamsamogo_1.png')}}" width="100%" alt="">
					      		
					      	</div>
					        
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		<img src="{{asset('img/jam/Different-Logos-JamUnity-Logo-Portrait.png')}}"width="100%"  alt="">
					        	
					        </div>
					      </div>
					      <div class="col-md-3 col-6" style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	
					        	<img src="{{asset('img/jam/Different-Logos-ITISALL-Logo-Portrait.png')}}"width="100%"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		<img src="{{asset('img/jam/Different-Logos-JamTalent-Logo-Portrait.png')}}"width="100%"  alt="">
					        	
					        </div>
					      </div>
				      </div>
				   <!--   </div> -->
				</section>

 				<section >
					<div class="container">
						<div  class="row align-items-center" >
				      	<div class="col-md-3 col-6 with-border"style=" padding: 30px 30px!important;">
				      		<div class="border border-radius-5" style="border-radius:5px;">
				      			<img src="{{asset('img/jam/E-commerce-JamGo-Portrait.png')}}"  alt="">
					        	
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		<img src="{{asset('img/jam/Super-Apps-App-Builder-Portrait.png')}}"  alt="">

					        	
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		
					        	<img src="{{asset('img/jam/JamOlogyJamSoftPortrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/EcommerceJamaxPortrait.png')}}"  alt="">
					        </div>
					      </div>
				      </div>
					</div>
				</section>
				<section>
					<div class="container">
						<div  class="row align-items-center">
				    	<div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				    		<div class="border border-radius-5" style="border-radius:5px;">
				        	
				        	<img src="{{asset('img/jam/Different-Logos-amCommerceLogo-Portrait.png')}}"  alt="">
				        </div>
				      </div>
				      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      	<div class="border border-radius-5" style="border-radius:5px;">
				        	
				        	<img src="{{asset('img/jam/DifferentLogosJamRoboticsLogoLandscape.png')}}"  alt="">
				        </div>
				      </div>
				      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      	<div class="border border-radius-5" style="border-radius:5px;">
				        
				        <img src="{{asset('img/jam/E-commerce-JamMall-Portrait.png')}}"  alt="">

				      </div>
				      </div>
				      
				      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      	<div class="border border-radius-5" style="border-radius:5px;">
				        	
				        	<img src="{{asset('img/jam/Super-Apps-Smart-QR-Portrait.png')}}"  alt="">
				        </div>
				      </div>
				    </div>
					</div>
				</section>     
				<section >
					<div class="container">
						<div  class="row align-items-center">
				      	<div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      		<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/Enterprise-Level-JamConstra-Portrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/Enterprise-Level-JamFlix-Portrait.png')}}"  alt="">
					      	</div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	
					        	<img src="{{asset('img/jam/Different-Logos-Super-Charger-Logo-Portrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	
					        	<img src="{{asset('img/jam/JAMWSLOGO.png')}}"  alt="">
					        </div>
					      </div>
				      </div>
					</div>
				</section>      
				<section>
					<div class="container">
						<div  class="row align-items-center">
				      	<div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      		<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/JamAppsLogo.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/JAMDMSLOGO1.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">

					        	<img src="{{asset('img/jam/Different-Logos-JamAI-Logo-Portrait.png')}}"  style="" alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/jaminvestlogo.png')}}"  alt="">
					        </div>
					      </div>
				      </div>
					</div>
				</section>      
				<section >
					<div class="container">
						<div  class="row align-items-center">
				      	<div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      		<div class="border border-radius-5" style="border-radius:5px;">
					        	
					        	<img src="{{asset('img/jam/E-Learning-JamLearn-Portrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	
					        	<img src="{{asset('img/jam/Enterprise-Level-JamX-Portrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/JamOlogyJamCosultPortrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/JamOlogyJamMeiaPortrait.png')}}"  alt="">
					        </div>
					      </div>
				      </div>
					</div>
				</section>      
				<section>
					<div class="container">
						<div  class="row align-items-center">
				      	<div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      		<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/JamOLOGYLOGO1_1.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		<img src="{{asset('img/jam/JamJooglogo1.png')}}"  alt="">
					        	
					        </div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/Jam-Franchise-logo.png')}}"  alt="">
					      	</div>
					      </div>
					      <div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	
					        	<img src="{{asset('img/jam/E-LearningJamInstitutePortrait.png')}}"  alt="">
					        </div>
					      </div>
				      </div>
					</div>
				</section>      
				<section >
					<div class="container">
						<div  class="row align-items-center">
				      	<div class="col-md-3 col-6"style=" padding: 30px 30px!important;">
				      		<div class="border border-radius-5" style="border-radius:5px;">
				      			<img src="{{asset('img/jam/E-Learning-JamLearn-Portrait.png')}}"  alt="">
					        	
					        </div>
					      </div>
					      <div class="col-md-3 col-6 text-center"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					      		<img src="{{asset('img/jam/Knowledge-Hub-logo.png')}}"  alt="">
					        	
					        </div>
					      </div>
					      <div class="col-md-3 col-6 text-center"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/SuperAppsJamPa-Portrait.png')}}"  alt="">
					        </div>
					      </div>
					      <div class="col-md-3 col-6 text-center"style=" padding: 30px 30px!important;">
					      	<div class="border border-radius-5" style="border-radius:5px;">
					        	<img src="{{asset('img/jam/Pathway.png')}}"  alt="">

					      </div>
				      </div>
					</div>
				</section>  

				</div>
			</div>
		</div>
	</div>
	    
</section>

      

  

<!-- footer start -->
@include('includes.footer')

@endsection
<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>