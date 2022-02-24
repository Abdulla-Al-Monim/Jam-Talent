@extends('frontend.layout.template')
@section('title')
{{$freelancer->slug}}
@endsection
@section('meta')
<meta property="og:title" content="{{$freelancer->full_name}}" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:image" content="{{URL::to($freelancer->image)}}" />
  <meta property="og:description" content="{{$freelancer->sort_description}}" />
  <meta property="og:site_name" content="ShareThis" />
@endsection
@section('body-content')
@php

@endphp
<div class="single-page-header freelancer-header" data-background-image="{{asset('images/single-freelancer.jpg')}}">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image freelancer-avatar">
							@if($freelancer->image == null)
			           <img src="{{ asset('images/default.jpeg')}}" alt="">
			       @else
									<img src="{{ asset('images/freelancer/' . $freelancer->image)}}" alt="">
							@endif

						</div>
						<div class="header-details">
							<h3>{{$freelancer->full_name}}<span>{{$freelancer->sort_description}}</span></h3>
							<ul>
								<li><div class="star-rating" data-rating="{{$freelancer->freelancerActivity->average_rating}}"></div></li>
								<li>
								    
								    <!-- <img class="flag" src="images/flags/de.svg" alt="">  --><!-- {{$freelancer->location}} -->
								    @if($freelancer->location == 'AR')
                    <img class="flag" src="{{asset('images/flags/ar.svg')}}" alt="" title="Argentina" data-tippy-placement="top"> Argentina
                    
                    @elseif($freelancer->location == 'AM')
                    <img class="flag" src="{{asset('images/flags/am.svg')}}" alt="" title="Armenia" data-tippy-placement="top">
                    Armenia

                    @elseif($freelancer->location == 'AW')
                    <img class="flag" src="{{asset('images/flags/aw.svg')}}" alt="" title="Aruba" data-tippy-placement="top">
                    Aruba

                    @elseif($freelancer->location == 'AU')
                    <img class="flag" src="{{asset('images/flags/au.svg')}}" alt="" title="Australia" data-tippy-placement="top">
                    Australia

                    @elseif($freelancer->location == 'AT')
                    <img class="flag" src="{{asset('images/flags/at.svg')}}" alt="" title="Austria" data-tippy-placement="top">
                    Austria

                    @elseif($freelancer->location == 'AZ')
                    <img class="flag" src="{{asset('images/flags/az.svg')}}" alt="" title="Azerbaijan" data-tippy-placement="top">
                    Azerbaijan

                    @elseif($freelancer->location == 'BS')
                    <img class="flag" src="{{asset('images/flags/bs.svg')}}" alt="" title="Bahamas" data-tippy-placement="top">
                    Bahamas

                    @elseif($freelancer->location == 'BH')
                    <img class="flag" src="{{asset('images/flags/bh.svg')}}" alt="" title="Bahrain" data-tippy-placement="top">
                    Bahrain

                    @elseif($freelancer->location == 'BD')
                    <img class="flag" src="{{asset('images/flags/bd.svg')}}" alt="" title="Bangladesh" data-tippy-placement="top">
                    Bangladesh

                    @elseif($freelancer->location == 'BB')
                    <img class="flag" src="{{asset('images/flags/bb.svg')}}" alt="" title="Barbados" data-tippy-placement="top">
                    Barbados

                    @elseif($freelancer->location == 'BY')
                    <img class="flag" src="{{asset('images/flags/by.svg')}}" alt="" title="Belarus" data-tippy-placement="top">
                    Belarus

                    @elseif($freelancer->location == 'BE')
                    <img class="flag" src="{{asset('images/flags/be.svg')}}" alt="" title="Belgium" data-tippy-placement="top">
                    Belgium

                    @elseif($freelancer->location == 'BZ')
                    <img class="flag" src="{{asset('images/flags/bz.svg')}}" alt="" title="Belize" data-tippy-placement="top">
                    Belize

                    @elseif($freelancer->location == 'BJ')
                    <img class="flag" src="{{asset('images/flags/bj.svg')}}" alt="" title="Benin" data-tippy-placement="top">
                    Benin

                    @elseif($freelancer->location == 'BM')
                    <img class="flag" src="{{asset('images/flags/bm.svg')}}" alt="" title="Bermuda" data-tippy-placement="top">
                    Bermuda

                    @elseif($freelancer->location == 'BT')
                    <img class="flag" src="{{asset('images/flags/bt.svg')}}" alt="" title="Bhutan" data-tippy-placement="top">
                    Bhutan

                    @elseif($freelancer->location == 'BG')
                    <img class="flag" src="{{asset('images/flags/bg.svg')}}" alt="" title="Bulgaria" data-tippy-placement="top">
                    Bulgaria

                    @elseif($freelancer->location == 'BF')
                    <img class="flag" src="{{asset('images/flags/bf.svg')}}" alt="" title="Burkina Faso" data-tippy-placement="top">
                    Burkina Faso


                    @elseif($freelancer->location == 'BI')
                    <img class="flag" src="{{asset('images/flags/bi.svg')}}" alt="" title="Burundi" data-tippy-placement="top">
                    Burundi

                    @elseif($freelancer->location == 'KH')
                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="Cambodia" data-tippy-placement="top">
                    Cambodia

                    @elseif($freelancer->location == 'CM')
                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="Cameroon" data-tippy-placement="top">
                    Cameroon

                    @elseif($freelancer->location == 'CA')
                    <img class="flag" src="{{asset('images/flags/ca.svg')}}" alt="" title="Canada" data-tippy-placement="top">
                    Canada

                    @elseif($freelancer->location == 'CV')
                    <img class="flag" src="{{asset('images/flags/cv.svg')}}" alt="" title="Cape Verde" data-tippy-placement="top">
                    Cape Verde

                    @elseif($freelancer->location == 'KY')
                    <img class="flag" src="{{asset('images/flags/ky.svg')}}" alt="" title="Cayman Islands" data-tippy-placement="top">
                    Cayman Islands

                    @elseif($freelancer->location == 'CO')
                    <img class="flag" src="{{asset('images/flags/co.svg')}}" alt="" title="Colombia" data-tippy-placement="top">
                    Colombia

                    @elseif($freelancer->location == 'KM')
                    <img class="flag" src="{{asset('images/flags/km.svg')}}" alt="" title="Comoros" data-tippy-placement="top">
                    Comoros

                    @elseif($freelancer->location == 'CG')
                    <img class="flag" src="{{asset('images/flags/cg.svg')}}" alt="" title="Congo" data-tippy-placement="top">
                    Congo

                    @elseif($freelancer->location == 'CK')
                    <img class="flag" src="{{asset('images/flags/ck.svg')}}" alt="" title="Cook Islands" data-tippy-placement="top">
                    Cook Islands

                    @elseif($freelancer->location == 'CR')
                    <img class="flag" src="{{asset('images/flags/cr.svg')}}" alt="" title="Costa Rica" data-tippy-placement="top">
                    Costa Rica
                    
                    @elseif($freelancer->location == 'CI')
                    <img class="flag" src="{{asset('images/flags/ci.svg')}}" alt="" title="Côte d'Ivoire" data-tippy-placement="top">
                    Côte d'Ivoire
                    
                    @elseif($freelancer->location == 'HR')
                    <img class="flag" src="{{asset('images/flags/hr.svg')}}" alt="" title="Croatia" data-tippy-placement="top">
                    Croatia
                    
                    @elseif($freelancer->location == 'CU')
                    <img class="flag" src="{{asset('images/flags/cu.svg')}}" alt="" title="Cuba" data-tippy-placement="top">
                    Cuba
                    
                    @elseif($freelancer->location == 'CW')
                    <img class="flag" src="{{asset('images/flags/cw.svg')}}" alt="" title="Curaçao" data-tippy-placement="top">
                    Curaçao
                    
                    @elseif($freelancer->location == 'CY')
                    <img class="flag" src="{{asset('images/flags/cy.svg')}}" alt="" title="Cyprus" data-tippy-placement="top">
                    Cyprus
                    
                    @elseif($freelancer->location == 'CZ')
                    <img class="flag" src="{{asset('images/flags/cz.svg')}}" alt="" title="Czech Republic" data-tippy-placement="top">
                    Czech Republic
                    
                    @elseif($freelancer->location == 'DK')
                    <img class="flag" src="{{asset('images/flags/dk.svg')}}" alt="" title="Denmark" data-tippy-placement="top">
                    Denmark
                    
                    @elseif($freelancer->location == 'DJ')
                    <img class="flag" src="{{asset('images/flags/dj.svg')}}" alt="" title="Djibouti" data-tippy-placement="top">
                    Djibouti
                    
                    @elseif($freelancer->location == 'DM')
                    <img class="flag" src="{{asset('images/flags/dm.svg')}}" alt="" title="Dominica" data-tippy-placement="top">
                    Dominica
                    
                    @elseif($freelancer->location == 'DO')
                    <img class="flag" src="{{asset('images/flags/do.svg')}}" alt="" title="Dominican Republic" data-tippy-placement="top">
                    Dominican Republic
                    
                    @elseif($freelancer->location == 'EC')
                    <img class="flag" src="{{asset('images/flags/ec.svg')}}" alt="" title="Ecuador" data-tippy-placement="top">
                    Ecuador
                    
                    @elseif($freelancer->location == 'EG')
                    <img class="flag" src="{{asset('images/flags/eg.svg')}}" alt="" title="Egypt" data-tippy-placement="top">
                    Egypt
                    
                    @elseif($freelancer->location == 'GP')
                    <img class="flag" src="{{asset('images/flags/gp.svg')}}" alt="" title="Guadeloupe" data-tippy-placement="top">
                    Guadeloupe
                    
                    @elseif($freelancer->location == 'GU')
                    <img class="flag" src="{{asset('images/flags/gu.svg')}}" alt="" title="Guam" data-tippy-placement="top">
                    Guam
                    
                    @elseif($freelancer->location == 'GT')
                    <img class="flag" src="{{asset('images/flags/gt.svg')}}" alt="" title="Guatemala" data-tippy-placement="top">
                    Guatemala
                    
                    @elseif($freelancer->location == 'GG')
                    <img class="flag" src="{{asset('images/flags/gg.svg')}}" alt="" title="Guernsey" data-tippy-placement="top">
                    Guernsey
                    
                    @elseif($freelancer->location == 'GN')
                    <img class="flag" src="{{asset('images/flags/gn.svg')}}" alt="" title="Guinea" data-tippy-placement="top">
                    Guinea
                    
                    @elseif($freelancer->location == 'GW')
                    <img class="flag" src="{{asset('images/flags/gw.svg')}}" alt="" title="Guinea-Bissau" data-tippy-placement="top">
                    Guinea-Bissau
                    
                    @elseif($freelancer->location == 'GY')
                    <img class="flag" src="{{asset('images/flags/gy.svg')}}" alt="" title="Guyana" data-tippy-placement="top">
                    Guyana
                    
                    @elseif($freelancer->location == 'HT')
                    <img class="flag" src="{{asset('images/flags/ht.svg')}}" alt="" title="Haiti" data-tippy-placement="top">
                    Haiti
                    
                    @elseif($freelancer->location == 'HN')
                    <img class="flag" src="{{asset('images/flags/hn.svg')}}" alt="" title="Honduras" data-tippy-placement="top">
                    Honduras
                    
                    @elseif($freelancer->location == 'HK')
                    <img class="flag" src="{{asset('images/flags/hk.svg')}}" alt="" title="Hong Kong" data-tippy-placement="top">
                    Hong Kong
                    
                    @elseif($freelancer->location == 'HU')
                    <img class="flag" src="{{asset('images/flags/hu.svg')}}" alt="" title="Hungary" data-tippy-placement="top">
                    Hungary
                    
                    @elseif($freelancer->location == 'IS')
                    <img class="flag" src="{{asset('images/flags/is.svg')}}" alt="" title="Iceland" data-tippy-placement="top">
                    Iceland
                    
                    @elseif($freelancer->location == 'IN')
                    <img class="flag" src="{{asset('images/flags/in.svg')}}" alt="" title="India" data-tippy-placement="top">
                    India
                    
                    @elseif($freelancer->location == 'ID')
                    <img class="flag" src="{{asset('images/flags/id.svg')}}" alt="" title="Indonesia" data-tippy-placement="top">
                    Indonesia
                    
                    @elseif($freelancer->location == 'NO')
                    <img class="flag" src="{{asset('images/flags/no.svg')}}" alt="" title="Norway" data-tippy-placement="top">
                    Norway
                    
                    @elseif($freelancer->location == 'OM')
                    <img class="flag" src="{{asset('images/flags/om.svg')}}" alt="" title="Oman" data-tippy-placement="top">
                    Oman
                    
                    @elseif($freelancer->location == 'PK')
                    <img class="flag" src="{{asset('images/flags/pk.svg')}}" alt="" title="Pakistan" data-tippy-placement="top">
                    Pakistan
                    
                    @elseif($freelancer->location == 'PW')
                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="Palau" data-tippy-placement="top">
                    Palau
                    
                    @elseif($freelancer->location == 'PA')
                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="Panama" data-tippy-placement="top">
                    Panama
                    
                    @elseif($freelancer->location == 'PG')
                    <img class="flag" src="{{asset('images/flags/pg.svg')}}" alt="" title="Papua New Guinea" data-tippy-placement="top">
                    Papua New Guinea
                    
                    @elseif($freelancer->location == 'PY')
                    <img class="flag" src="{{asset('images/flags/py.svg')}}" alt="" title="Paraguay" data-tippy-placement="top">
                    Paraguay
                    
                    @elseif($freelancer->location == 'PE')
                    <img class="flag" src="{{asset('images/flags/pe.svg')}}" alt="" title="Peru" data-tippy-placement="top">
                    Peru
                    
                    @elseif($freelancer->location == 'PH')
                    <img class="flag" src="{{asset('images/flags/ph.svg')}}" alt="" title="Philippines" data-tippy-placement="top">
                    Philippines
                    
                    @elseif($freelancer->location == 'PN')
                    <img class="flag" src="{{asset('images/flags/pn.svg')}}" alt="" title="Pitcairn" data-tippy-placement="top">
                    Pitcairn
                    
                    @elseif($freelancer->location == 'PL')
                    <img class="flag" src="{{asset('images/flags/pl.svg')}}" alt="" title="Poland" data-tippy-placement="top">
                    Poland
                    
                    @elseif($freelancer->location == 'PT')
                    <img class="flag" src="{{asset('images/flags/pt.svg')}}" alt="" title="Portugal" data-tippy-placement="top">
                    Portugal
                     @elseif($freelancer->location == 'PR')
                    <img class="flag" src="{{asset('images/flags/pr.svg')}}" alt="" title="Puerto Rico" data-tippy-placement="top">
                    Puerto Rico
                    
                    @elseif($freelancer->location == 'QA')
                    <img class="flag" src="{{asset('images/flags/qa.svg')}}" alt="" title="Qatar" data-tippy-placement="top">
                    Qatar
                    
                    @elseif($freelancer->location == 'RE')
                    <img class="flag" src="{{asset('images/flags/re.svg')}}" alt="" title="Réunion" data-tippy-placement="top">
                    Réunion
                    
                    @elseif($freelancer->location == 'RO')
                    <img class="flag" src="{{asset('images/flags/ro.svg')}}" alt="" title="Romania" data-tippy-placement="top">
                    Romania
                    
                    @elseif($freelancer->location == 'RU')
                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="Russian Federation" data-tippy-placement="top">
                    Russian Federation
                    
                    @elseif($freelancer->location == 'RW')
                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="Rwanda" data-tippy-placement="top">
                    Rwanda
                    
                    @elseif($freelancer->location == 'SZ')
                    <img class="flag" src="{{asset('images/flags/sz.svg')}}" alt="" title="Swaziland" data-tippy-placement="top">
                    Swaziland
                    
                    @elseif($freelancer->location == 'SE')
                    <img class="flag" src="{{asset('images/flags/se.svg')}}" alt="" title="Sweden" data-tippy-placement="top">
                    Sweden
                    
                    @elseif($freelancer->location == 'CH')
                    <img class="flag" src="{{asset('images/flags/ch.svg')}}" alt="" title="Switzerland" data-tippy-placement="top">
                    Switzerland
                    
                    @elseif($freelancer->location == 'TR')
                    <img class="flag" src="{{asset('images/flags/tr.svg')}}" alt="" title="Turkey" data-tippy-placement="top">
                    Turkey
                    
                    @elseif($freelancer->location == 'TM')
                    <img class="flag" src="{{asset('images/flags/tm.svg')}}" alt="" title="Turkmenistan" data-tippy-placement="top">
                    Turkmenistan
                    
                    @elseif($freelancer->location == 'TV')
                    <img class="flag" src="{{asset('images/flags/tv.svg')}}" alt="" title="Tuvalu" data-tippy-placement="top">
                    Tuvalu
                    
                    @elseif($freelancer->location == 'UG')
                    <img class="flag" src="{{asset('images/flags/ug.svg')}}" alt="" title="Uganda" data-tippy-placement="top">
                    Uganda
                    
                    @elseif($freelancer->location == 'UA')
                    <img class="flag" src="{{asset('images/flags/ua.svg')}}" alt="" title="Ukraine" data-tippy-placement="top">
                    Ukraine
                    
                    @elseif($freelancer->location == 'GB')
                    <img class="flag" src="{{asset('images/flags/gb.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
                    United Kingdom
                    
                    @elseif($freelancer->location == 'US')
                    <img class="flag" src="{{asset('images/flags/us.svg')}}" alt="" title="United States" data-tippy-placement="top">
                    United States
                    @elseif($freelancer->location == 'LB')
                    <img class="flag" src="{{asset('images/flags/libya.svg')}}" alt="" title="Libya" data-tippy-placement="top">
                    Libya
                    @elseif($freelancer->location == 'UY')
                    <img class="flag" src="{{asset('images/flags/uy.svg')}}" alt="" title="Uruguay" data-tippy-placement="top">
                    Uruguay
                    
                    @elseif($freelancer->location == 'UZ')
                    <img class="flag" src="{{asset('images/flags/uz.svg')}}" alt="" title="Uzbekistan" data-tippy-placement="top">
                    Uzbekistan
                    
                    @elseif($freelancer->location == 'YE')
                    <img class="flag" src="{{asset('images/flags/ye.svg')}}" alt="" title="Yemen" data-tippy-placement="top">
                    Yemen
                    
                    @elseif($freelancer->location == 'ZM')
                    <img class="flag" src="{{asset('images/flags/zm.svg')}}" alt="" title="Zambia" data-tippy-placement="top">
                    Zambia
                    @elseif($freelancer->location == 'Palestine')
                    <img class="flag" src="{{asset('images/flags/Palestine-Flag.svg')}}" alt="" title="Palestine" data-tippy-placement="top">
                    Palestine
                @elseif($freelancer->location === "Emirates")
                    <em><img class="flag" src="{{asset('images/flags/Emirates-flag.svg')}}" alt="United Arab Emirates" title="United Arab Emirates" data-tippy-placement="top"></em>
                    United Arab Emirates
                    @elseif($freelancer->location == 'Syria')
                    <img class="flag" src="{{asset('images/flags/Syria-Flag.svg')}}" alt="" title="Syria" data-tippy-placement="top">
                    Syria
                    @endif
								    </li>
								<li><div class="verified-badge-with-title">Verified</div></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="background-image-container" style="background-image: url(&quot;images/single-freelancer.jpg&quot;);"></div></div>
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">
			
			<!-- Page Content -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">{{__('freelancer.About Me')}}</h3>
				<p>{!!$freelancer->description!!}</p>
			</div>

			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-thumb-up"></i>{{__('freelancer.Work History and Feedback')}}</h3>
				</div>
				<ul class="boxed-list-ul">
					@foreach($freelancerReviews as $freelancerReview)
					<li>
						<div class="boxed-list-item">
							<!-- Content -->
							<div class="item-content">
								@php
									$employer = App\Models\User::where('id',$freelancerReview->user_id)->first();
								@endphp
								<h4>{{$employer->full_name}} </h4>

								<div class="item-details margin-top-10">
									@if($freelancerReview->rating == 1)
									<div class="star-rating" data-rating="1">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($freelancerReview->rating == 2)
									<div class="star-rating" data-rating="2">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($freelancerReview->rating == 3)
									<div class="star-rating" data-rating="3">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($freelancerReview->rating == 4)
									<div class="star-rating" data-rating="4">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($freelancerReview->rating == 5)
									<div class="star-rating" data-rating="5">
										<!-- <span class="star"></span> -->
									</div>
									@endif
									
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($freelancerReview->created_at)->format('d/m/Y')}}</div>
								</div>
								<div class="item-description">
									<p>{{$freelancerReview->comment}}</p>
								</div>
							</div>
						</div>
					</li>
					@endforeach
					
				</ul>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<!-- <div class="pagination-container margin-top-40 margin-bottom-10">
					<nav class="pagination">
						<ul>
							<li><a href="{!!$freelancerReviews->previousPageUrl()!!}" class="ripple-effect current-page">1</a></li>
							<li><a href="{!!$freelancerReviews->nextPageUrl()!!}" class="ripple-effect">2</a></li>
							<li class="pagination-arrow"><a href="{!!$freelancerReviews->nextPageUrl()!!}" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
						</ul>
					</nav>
				</div> -->
				<div class="d-felx justify-content-center">

		            {{ $freelancerReviews->links('pagination::bootstrap-4') }}

		        </div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->

			</div>
			<!-- Boxed List / End -->
			
			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business"></i>{{__('freelancer.Employment History')}} </h3>
				</div>
				<ul class="boxed-list-ul">
          
          @foreach($employmentHistories as $employmentHistory)
					<li>
						<div class="boxed-list-item">
							<!-- Avatar -->
							<div class="item-image">
								<img src="{{ asset('images/employmentHistory/' . $employmentHistory->image)}}" >
							</div>
							
							<!-- Content -->
							<div class="item-content">
								<h4>{{$employmentHistory->title}}</h4>
								<div class="item-details margin-top-7">
									<div class="detail-item"><a href="{{$employmentHistory->company_url}}" ><i class="icon-material-outline-business"></i> {{$employmentHistory->company_name}}</a></div>
									
								</div>
								<div class="item-description">
									<p>{!!$employmentHistory->s_desciption!!}</p>
								</div>
							</div>
						</div>
					</li>
          @endforeach
				</ul>
			</div>
			<!-- Boxed List / End -->
<div class="d-felx justify-content-center">

                {{ $employmentHistories->links('pagination::bootstrap-4') }}

            </div>
		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">
				
				<!-- Profile Overview -->
				<div class="profile-overview">
					<div class="overview-item"><strong>${{$freelancer->hourly_rate}}</strong><span>{{__('freelancer.Hourly Rate')}}</span></div>

					<div class="overview-item"><strong>{{$jobDone}}</strong><span>{{__('freelancer.Jobs Done')}}</span></div>
					<!-- <div class="overview-item"><strong>22</strong><span>Rehired</span></div> -->
				</div>

				<!-- Button -->
				@if( Route::has('login'))
		            @auth
		            	@if( Auth::user()->user_type_id == 3 )
				
							<a href="#small-dialog-3" class="apply-now-button popup-with-zoom-anim margin-bottom-50">{{__('freelancer.Make an Offer')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
							<div id="small-dialog-3" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

							<!--Tabs -->
								<div class="sign-in-form">

									<ul class="popup-tabs-nav">
										<li><a href="#tab3">{{__('freelancer.Make an Offer')}}</a></li>
									</ul>

									<div class="popup-tabs-container">

										<!-- Tab -->
										<div class="popup-tab-content" id="tab">
											
											<!-- Welcome Text -->
											<div class="welcome-text">
												<h3>{{__('freelancer.Discuss your project with')}} {{$freelancer->full_name}}</h3>
											</div>
												
											<!-- Form -->
											<form method="post" action="{{route('task.offer',$freelancer->id)}}"  enctype="multipart/form-data">
												@csrf
												<div class="input-with-icon-left">
													
													<input type="text" class="input-text with-border" required name="title" required autocomplete="off" id="name" placeholder="{{__('freelancer.Task Title')}}"/>
												</div>
                        @error('title')
                          <div class="alert alert-danger">{{__('backendJob.The Task Title field is required.')}}</div>
                      @enderror
											 	<div class="input-with-icon-left">
													
													<input type="text" required class="input-text with-border" required autocomplete="off" name="emailaddress" id="emailaddress" placeholder="{{__('freelancer.Email Address')}}"/>
												</div>
                       @error('emailaddress')
                          <div class="alert alert-danger">{{__('backendJob.Email Addresas field is required.')}}</div>
                      @enderror
                        <div class="input-with-icon-left">
                          
                          <input type="number" required class="input-text with-border" autocomplete="off" name="budget" id="budget" placeholder="{{__('freelancer.Budget')}}"/>
                        </div>
                        @error('budget')
                          <div class="alert alert-danger">{{__('backendJob.Must be Number')}}</div>
                      @enderror
												<textarea cols="10" required placeholder="{{__('backendTask.Message')}}" class="with-border" name="message"></textarea>
                        @error('message')
                          <div class="alert alert-danger">{{__('backendJob.The job type field is required.')}}</div>
                      @enderror
												<div class="uploadButton margin-top-25">
													<input class="uploadButton-input" type="file" accept="image/*, application/pdf" required id="upload" name="file" multiple/ required="required">
													<label class="uploadButton-button ripple-effect" for="upload">{{__('freelancer.Add Attachments')}}</label>
													<span class="uploadButton-file-name">{{__('freelancer.Allowed file types:')}} zip, pdf, png, jpg <br> {{__('freelancer.Max. files size:')}} 50 MB.</span>
												</div>
                        @error('file')
                          <div class="alert alert-danger">{{__('backendJob.The job type field is required.')}}</div>
                      @enderror
												<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('freelancer.Make an Offer')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

											</form>
											
											<!-- Button -->
											

										</div>
										

									</div>
								</div>
							</div>
							@endif
						@endif
				@endif	

				<!-- Freelancer Indicators -->
				<div class="sidebar-widget">
					<div class="freelancer-indicators">
						@php
							if($freelancer->freelancerActivity->on_time == 0){
								$onTime = 0;
							}
							else{
								$onTime = (int) round(($freelancer->freelancerActivity->on_time / $freelancer->freelancerActivity->total_review),0);
							}
							 if($freelancer->freelancerActivity->on_budget == 0){
							 	$onBudget= 0;
							 }
							 else{
							 $onBudget = (int) round(($freelancer->freelancerActivity->on_budget / $freelancer->freelancerActivity->total_review),0);
							}
						@endphp
						<!-- Indicator -->
						<div class="indicator">
							<strong>{{$onTime}}%</strong>
							<div class="indicator-bar" data-indicator-percentage="{{$onTime}}"><span style="width: {{$onTime}}%;"></span></div>
							<span>{{__('freelancer.Job Success')}}</span>
						</div>

						<!-- Indicator -->
						<!-- <div class="indicator">
							<strong>100%</strong>
							<div class="indicator-bar" data-indicator-percentage="100"><span style="width: 100%;"></span></div>
							<span>Recommendation</span>
						</div> -->
						
						<!-- Indicator -->
						<div class="indicator">
							<strong>{{$onTime}}%</strong>
							<div class="indicator-bar" data-indicator-percentage="{{$onTime}}"><span style="width: {{$onTime}}%;"></span></div>
							<span>{{__('freelancer.On Time')}}</span>
						</div>	
											
						<!-- Indicator -->
						<div class="indicator">
							<strong>{{$onBudget}}%</strong>
							<div class="indicator-bar" data-indicator-percentage="{{$onBudget}}"><span style="width: {{$onBudget}}%;"></span></div>
							<span>{{__('freelancer.On Budget')}}</span>
						</div>
					</div>
				</div>
				
				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>{{__('freelancer.Social Profiles')}}</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
              @if($freelancer->socialMedia->facebook !== null)
							<li><a href="{{$freelancer->socialMedia->facebook}}" data-tippy-placement="top" target="_blank" data-tippy="" data-original-title="Facebook"><i class="icon-brand-facebook-f"></i></a></li>
              @endif
              @if($freelancer->socialMedia->twitter !== null)
							<li><a href="{{$freelancer->socialMedia->twitter}}" target="_blank" data-tippy-placement="top"target="_blank" data-tippy="" data-original-title="Twitter"><i class="icon-brand-twitter"></i></a></li>
              @endif
              @if($freelancer->socialMedia->linkedin !== null)
							<li><a href="{{$freelancer->socialMedia->linkedin}}" target="_blank" data-tippy-placement="top" target="_blank" data-tippy="" data-original-title="linkedin"><i class="icon-brand-linkedin-in"></i></a></li>
              @endif
              @if($freelancer->socialMedia->github !== null)
							<li><a href="{{$freelancer->socialMedia->github}}" data-tippy-placement="top" target="_blank" data-tippy="" data-original-title="GitHub"><i class="icon-brand-github"></i></a></li>
              @endif
						
						</ul>
					</div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>{{__('freelancer.Skills')}}</h3>
					<div class="task-tags">
						@if($freelancer->skill->skill_one !== null)
						<span>{{$freelancer->skill->skill_one}}</span>
						@endif
						@if($freelancer->skill->skill_two !== null)
						<span>{{$freelancer->skill->skill_two}}</span>
						@endif
						@if($freelancer->skill->skill_three !== null)
						<span>{{$freelancer->skill->skill_three}}</span>
						@endif
						@if($freelancer->skill->skill_four !== null)
						<span>{{$freelancer->skill->skill_four}}</span>
						@endif
						@if($freelancer->skill->skill_five !== null)
						<span>{{$freelancer->skill->skill_five}}</span>
						@endif
						@if($freelancer->skill->skill_sex !== null)
						<span>{{$freelancer->skill->skill_sex}}</span>
						@endif
						
					</div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>{{__('freelancer.Attachments')}}</h3>
					<div class="attachments-container">
            @if($freelancer->file || $freelancer->file_link)
            <div class="attachment-box ripple-effect">
              {{__('freelancer.Cover Letter')}}
              @if($freelancer->file)
              
                <a href="{{route('freelancer.coverlLitter.download', $freelancer->id)}}" class="padding-top-25 icon-feather-square"> PDF</a>
                
                @endif
                @if($freelancer->file_link)
            <a href="{{$freelancer->file_link}}" target="_blank" class=""><i class="icon-line-awesome-external-link-square">{{$freelancer->file_link}}</i></a>
            @endif
            </div>
            @endif
            @if($freelancer->cv || $freelancer->cv_link)
						<div class="attachment-box ripple-effect">
              {{__('backendIndex.CV')}}
              @if($freelancer->cv)
              
                <a href="{{route('freelancer.cv.download', $freelancer->id)}}" class="padding-top-25 icon-feather-square"> PDF</a>
                
                @endif
                @if($freelancer->cv_link)
            <a href="{{$freelancer->cv_link}}" target="_blank" class=""><i class="icon-line-awesome-external-link-square">{{$freelancer->cv_link}}</i></a>
            @endif
            </div>
            @endif
            @if($freelancer->portfolio || $freelancer->portfolio_link)
           <div class="attachment-box ripple-effect">
            {{__('backendIndex.Portfolio')}}
              @if($freelancer->portfolio)
             
                <a href="{{route('freelancer.portfolio.download', $freelancer->id)}}" class="padding-top-25 icon-feather-square"> PDF</a>
                
                @endif
                @if($freelancer->portfolio_link)
            <a href="{{$freelancer->portfolio_link}}" target="_blank" class=""><i class="icon-line-awesome-external-link-square">{{$freelancer->portfolio_link}}</i></a>
            @endif
            </div>
            @endif
            @if($freelancer->qualification_certificate || $freelancer->qualification_certificate_link)
            <div class="attachment-box ripple-effect">
              {{__('backendIndex.Qualification Certificates')}}
              @if($freelancer->qualification_certificate)

                <a href="{{route('freelancer.qualification.download', $freelancer->id)}}" class="padding-top-25 icon-feather-square"> PDF</a>
                
                @endif
                @if($freelancer->qualification_certificate_link)
            <a href="{{$freelancer->qualification_certificate_link}}" target="_blank" class=""><i class="icon-line-awesome-external-link-square">{{$freelancer->qualification_certificate_link}}</i></a>
            @endif
            </div>
            @endif
            @if($freelancer->recommendation_letter || $freelancer->recommendation_letter_link)
            <div class="attachment-box ripple-effect">
              {{__('backendIndex.Recommendation Letters')}}
              @if($freelancer->recommendation_letter)
             
                <a href="{{route('freelancer.recommendation.download', $freelancer->id)}}" class="padding-top-25 icon-feather-square"> PDF</a>
                
                @endif
                @if($freelancer->recommendation_letter_link)
            <a href="{{$freelancer->recommendation_letter_link}}" target="_blank" class=""><i class="icon-line-awesome-external-link-square">{{$freelancer->recommendation_letter_link}}</i></a>
            @endif
            </div>
            @endif


            

            
						
						<!-- <a href="#" class="attachment-box ripple-effect"><span>Contract</span><i>DOCX</i></a> -->
					</div>
				</div>

				
					@if( Route::has('login'))
          <!-- Sidebar Widget -->
        
                  		@auth
                    		@if( Auth::user()->user_type_id == 3 )
                        <div class="sidebar-widget">
          <h3>{{__('task.Bookmark or Share')}}</h3>
								
								<!-- Bookmark Icon -->

								      <!-- <span class=""><span class="icon-material-baseline-star-border bookmark" style=""></span></span> -->
			                      @php
			                      $count = App\Models\Backend\BookMarkFreelancer::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('freelancer_id',$freelancer->id)->count();
			                      @endphp
			                      @if($count == 0)
                      
			                      <form action="{{route('bookmark.freelancer',$freelancer->id)}}" method="POST">
			                        @csrf
			                        <button class="bookmarkbButton margin-bottom-25" type="submit">
										<span class="bookmark-text">{{__('freelancer.Bookmark')}}</span>
									</button>
			                      </form>
			                      
			                      @else
			                      @foreach(App\Models\Backend\BookMarkFreelancer::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('freelancer_id',$freelancer->id)->get() as $bookMark)
			                      <form action="{{route('bookmark.freelancer.remove',$bookMark->id)}}" method="POST">
			                        @csrf
			                        <button class="bookmarkbButton margin-bottom-25" type="submit">
										<span class="bookmarked-text">{{__('freelancer.Bookmarked')}}</span>
			                        </button>
			                      </form>
		                        @endforeach
		                      @endif
                          

                          
		                    @endif
                        <a href="#small-dialog-2{{$freelancer->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('freelancer.Send Message')}}</a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$freelancer->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

  <!--Tabs -->
  <div class="sign-in-form">

    <ul class="popup-tabs-nav">
      <li><a href="#tab2">{{__('freelancer.Send Message')}}</a></li>
    </ul>

    <div class="popup-tabs-container">

      <!-- Tab -->
      <div class="popup-tab-content" id="tab2">
        
        <!-- Welcome Text -->
        <div class="welcome-text">
          <h3>{{__('freelancer.Direct Message To')}} {{$freelancer->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$freelancer->id)}}">
          @csrf
          <textarea name="message" cols="10" placeholder="{{__('backendTask.Message')}}" class="with-border" required></textarea>
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">{{__('freelancer.Send')}} <i class="icon-material-outline-arrow-right-alt"></i></button>
        </form>
        <!-- Button -->
        

      </div>

    </div>
  </div>
</div>
                      @else
                      <a href="{{route('message.not.send')}}" class="button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('freelancer.Send Message')}}</a>
		                  @endif

                       
		                @endif

					<!-- Bookmark Button -->
					<!-- <button class="bookmark-button margin-bottom-25">
						<span class="bookmark-icon"></span>
						<span class="bookmark-text">Bookmark</span>
						<span class="bookmarked-text">Bookmarked</span>
					</button> -->

					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" data-tippy-placement="top" data-tippy="" data-original-title="Copy to Clipboard"><i class="icon-material-outline-file-copy"></i></button>
					</div>

					<!-- Share Buttons -->
					<div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content">
							<span>{{__('freelancer.Interesting')}}? <strong>{{__('freelancer.Share It')}}!</strong></span>
							<ul class="share-buttons-icons">
								<!-- ShareThis BEGIN -->
									<div class="sharethis-inline-share-buttons"></div>
								<!-- ShareThis END -->
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<!-- Make an Offer Popup
================================================== -->
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection