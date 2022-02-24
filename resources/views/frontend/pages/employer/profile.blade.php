@extends('frontend.layout.template')
@section('title')
{{$emp->slug}}
@endsection
@section('body-content')
<div class="single-page-header" data-background-image="{{asset('images/single-company.jpg')}}">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image">
							@if($emp->image == null)
					           <img src="{{ asset('images/default.jpeg')}}" alt="">
					         @else
								<img src="{{ asset('images/employer/' . $emp->image)}}" alt="">
							@endif
						</div>
						<div class="header-details">
							<h3>
								@if($emp->full_name == null)
								Unknown
								
								@else
								<span>{{$emp->full_name}} </span>
								@endif
								</h3>
							<ul>
								<li><div class="star-rating" data-rating="
									@if($emp->employerActivity)
									{{$emp->employerActivity->average_rating}}
									@endif
									"></div></li>
								<li>
									<!-- <img class="flag" src="images/flags/de.svg" alt=""> {{$emp->location}} -->
								    @if($emp->location == 'AR')
				                    <img class="flag" src="{{asset('images/flags/ar.svg')}}" alt="" title="Argentina" data-tippy-placement="top"> Argentina
				                    
				                    @elseif($emp->location == 'AM')
				                    <img class="flag" src="{{asset('images/flags/am.svg')}}" alt="" title="Armenia" data-tippy-placement="top">
				                    Armenia

				                    @elseif($emp->location == 'AW')
				                    <img class="flag" src="{{asset('images/flags/aw.svg')}}" alt="" title="Aruba" data-tippy-placement="top">
				                    Aruba

				                    @elseif($emp->location == 'AU')
				                    <img class="flag" src="{{asset('images/flags/au.svg')}}" alt="" title="Australia" data-tippy-placement="top">
				                    Australia

				                    @elseif($emp->location == 'AT')
				                    <img class="flag" src="{{asset('images/flags/at.svg')}}" alt="" title="Austria" data-tippy-placement="top">
				                    Austria

				                    @elseif($emp->location == 'AZ')
				                    <img class="flag" src="{{asset('images/flags/az.svg')}}" alt="" title="Azerbaijan" data-tippy-placement="top">
				                    Azerbaijan

				                    @elseif($emp->location == 'BS')
				                    <img class="flag" src="{{asset('images/flags/bs.svg')}}" alt="" title="Bahamas" data-tippy-placement="top">
				                    Bahamas

				                    @elseif($emp->location == 'BH')
				                    <img class="flag" src="{{asset('images/flags/bh.svg')}}" alt="" title="Bahrain" data-tippy-placement="top">
				                    Bahrain

				                    @elseif($emp->location == 'BD')
				                    <img class="flag" src="{{asset('images/flags/bd.svg')}}" alt="" title="Bangladesh" data-tippy-placement="top">
				                    Bangladesh

				                    @elseif($emp->location == 'BB')
				                    <img class="flag" src="{{asset('images/flags/bb.svg')}}" alt="" title="Barbados" data-tippy-placement="top">
				                    Barbados

				                    @elseif($emp->location == 'BY')
				                    <img class="flag" src="{{asset('images/flags/by.svg')}}" alt="" title="Belarus" data-tippy-placement="top">
				                    Belarus

				                    @elseif($emp->location == 'BE')
				                    <img class="flag" src="{{asset('images/flags/be.svg')}}" alt="" title="Belgium" data-tippy-placement="top">
				                    Belgium

				                    @elseif($emp->location == 'BZ')
				                    <img class="flag" src="{{asset('images/flags/bz.svg')}}" alt="" title="Belize" data-tippy-placement="top">
				                    Belize

				                    @elseif($emp->location == 'BJ')
				                    <img class="flag" src="{{asset('images/flags/bj.svg')}}" alt="" title="Benin" data-tippy-placement="top">
				                    Benin

				                    @elseif($emp->location == 'BM')
				                    <img class="flag" src="{{asset('images/flags/bm.svg')}}" alt="" title="Bermuda" data-tippy-placement="top">
				                    Bermuda

				                    @elseif($emp->location == 'BT')
				                    <img class="flag" src="{{asset('images/flags/bt.svg')}}" alt="" title="Bhutan" data-tippy-placement="top">
				                    Bhutan

				                    @elseif($emp->location == 'BG')
				                    <img class="flag" src="{{asset('images/flags/bg.svg')}}" alt="" title="Bulgaria" data-tippy-placement="top">
				                    Bulgaria

				                    @elseif($emp->location == 'BF')
				                    <img class="flag" src="{{asset('images/flags/bf.svg')}}" alt="" title="Burkina Faso" data-tippy-placement="top">
				                    Burkina Faso


				                    @elseif($emp->location == 'BI')
				                    <img class="flag" src="{{asset('images/flags/bi.svg')}}" alt="" title="Burundi" data-tippy-placement="top">
				                    Burundi

				                    @elseif($emp->location == 'KH')
				                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="Cambodia" data-tippy-placement="top">
				                    Cambodia

				                    @elseif($emp->location == 'CM')
				                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="Cameroon" data-tippy-placement="top">
				                    Cameroon

				                    @elseif($emp->location == 'CA')
				                    <img class="flag" src="{{asset('images/flags/ca.svg')}}" alt="" title="Canada" data-tippy-placement="top">
				                    Canada

				                    @elseif($emp->location == 'CV')
				                    <img class="flag" src="{{asset('images/flags/cv.svg')}}" alt="" title="Cape Verde" data-tippy-placement="top">
				                    Cape Verde

				                    @elseif($emp->location == 'KY')
				                    <img class="flag" src="{{asset('images/flags/ky.svg')}}" alt="" title="Cayman Islands" data-tippy-placement="top">
				                    Cayman Islands

				                    @elseif($emp->location == 'CO')
				                    <img class="flag" src="{{asset('images/flags/co.svg')}}" alt="" title="Colombia" data-tippy-placement="top">
				                    Colombia

				                    @elseif($emp->location == 'KM')
				                    <img class="flag" src="{{asset('images/flags/km.svg')}}" alt="" title="Comoros" data-tippy-placement="top">
				                    Comoros

				                    @elseif($emp->location == 'CG')
				                    <img class="flag" src="{{asset('images/flags/cg.svg')}}" alt="" title="Congo" data-tippy-placement="top">
				                    Congo

				                    @elseif($emp->location == 'CK')
				                    <img class="flag" src="{{asset('images/flags/ck.svg')}}" alt="" title="Cook Islands" data-tippy-placement="top">
				                    Cook Islands

				                    @elseif($emp->location == 'CR')
				                    <img class="flag" src="{{asset('images/flags/cr.svg')}}" alt="" title="Costa Rica" data-tippy-placement="top">
				                    Costa Rica
				                    
				                    @elseif($emp->location == 'CI')
				                    <img class="flag" src="{{asset('images/flags/ci.svg')}}" alt="" title="Côte d'Ivoire" data-tippy-placement="top">
				                    Côte d'Ivoire
				                    
				                    @elseif($emp->location == 'HR')
				                    <img class="flag" src="{{asset('images/flags/hr.svg')}}" alt="" title="Croatia" data-tippy-placement="top">
				                    Croatia
				                    
				                    @elseif($emp->location == 'CU')
				                    <img class="flag" src="{{asset('images/flags/cu.svg')}}" alt="" title="Cuba" data-tippy-placement="top">
				                    Cuba
				                    
				                    @elseif($emp->location == 'CW')
				                    <img class="flag" src="{{asset('images/flags/cw.svg')}}" alt="" title="Curaçao" data-tippy-placement="top">
				                    Curaçao
				                    
				                    @elseif($emp->location == 'CY')
				                    <img class="flag" src="{{asset('images/flags/cy.svg')}}" alt="" title="Cyprus" data-tippy-placement="top">
				                    Cyprus
				                    
				                    @elseif($emp->location == 'CZ')
				                    <img class="flag" src="{{asset('images/flags/cz.svg')}}" alt="" title="Czech Republic" data-tippy-placement="top">
				                    Czech Republic
				                    
				                    @elseif($emp->location == 'DK')
				                    <img class="flag" src="{{asset('images/flags/dk.svg')}}" alt="" title="Denmark" data-tippy-placement="top">
				                    Denmark
				                    
				                    @elseif($emp->location == 'DJ')
				                    <img class="flag" src="{{asset('images/flags/dj.svg')}}" alt="" title="Djibouti" data-tippy-placement="top">
				                    Djibouti
				                    
				                    @elseif($emp->location == 'DM')
				                    <img class="flag" src="{{asset('images/flags/dm.svg')}}" alt="" title="Dominica" data-tippy-placement="top">
				                    Dominica
				                    
				                    @elseif($emp->location == 'DO')
				                    <img class="flag" src="{{asset('images/flags/do.svg')}}" alt="" title="Dominican Republic" data-tippy-placement="top">
				                    Dominican Republic
				                    
				                    @elseif($emp->location == 'EC')
				                    <img class="flag" src="{{asset('images/flags/ec.svg')}}" alt="" title="Ecuador" data-tippy-placement="top">
				                    Ecuador
				                    
				                    @elseif($emp->location == 'EG')
				                    <img class="flag" src="{{asset('images/flags/eg.svg')}}" alt="" title="Egypt" data-tippy-placement="top">
				                    Egypt
				                    
				                    @elseif($emp->location == 'GP')
				                    <img class="flag" src="{{asset('images/flags/gp.svg')}}" alt="" title="Guadeloupe" data-tippy-placement="top">
				                    Guadeloupe
				                    
				                    @elseif($emp->location == 'GU')
				                    <img class="flag" src="{{asset('images/flags/gu.svg')}}" alt="" title="Guam" data-tippy-placement="top">
				                    Guam
				                    
				                    @elseif($emp->location == 'GT')
				                    <img class="flag" src="{{asset('images/flags/gt.svg')}}" alt="" title="Guatemala" data-tippy-placement="top">
				                    Guatemala
				                    
				                    @elseif($emp->location == 'GG')
				                    <img class="flag" src="{{asset('images/flags/gg.svg')}}" alt="" title="Guernsey" data-tippy-placement="top">
				                    Guernsey
				                    
				                    @elseif($emp->location == 'GN')
				                    <img class="flag" src="{{asset('images/flags/gn.svg')}}" alt="" title="Guinea" data-tippy-placement="top">
				                    Guinea
				                    
				                    @elseif($emp->location == 'GW')
				                    <img class="flag" src="{{asset('images/flags/gw.svg')}}" alt="" title="Guinea-Bissau" data-tippy-placement="top">
				                    Guinea-Bissau
				                    
				                    @elseif($emp->location == 'GY')
				                    <img class="flag" src="{{asset('images/flags/gy.svg')}}" alt="" title="Guyana" data-tippy-placement="top">
				                    Guyana
				                    
				                    @elseif($emp->location == 'HT')
				                    <img class="flag" src="{{asset('images/flags/ht.svg')}}" alt="" title="Haiti" data-tippy-placement="top">
				                    Haiti
				                    
				                    @elseif($emp->location == 'HN')
				                    <img class="flag" src="{{asset('images/flags/hn.svg')}}" alt="" title="Honduras" data-tippy-placement="top">
				                    Honduras
				                    
				                    @elseif($emp->location == 'HK')
				                    <img class="flag" src="{{asset('images/flags/hk.svg')}}" alt="" title="Hong Kong" data-tippy-placement="top">
				                    Hong Kong
				                    
				                    @elseif($emp->location == 'HU')
				                    <img class="flag" src="{{asset('images/flags/hu.svg')}}" alt="" title="Hungary" data-tippy-placement="top">
				                    Hungary
				                    
				                    @elseif($emp->location == 'IS')
				                    <img class="flag" src="{{asset('images/flags/is.svg')}}" alt="" title="Iceland" data-tippy-placement="top">
				                    Iceland
				                    
				                    @elseif($emp->location == 'IN')
				                    <img class="flag" src="{{asset('images/flags/in.svg')}}" alt="" title="India" data-tippy-placement="top">
				                    India
				                    
				                    @elseif($emp->location == 'ID')
				                    <img class="flag" src="{{asset('images/flags/id.svg')}}" alt="" title="Indonesia" data-tippy-placement="top">
				                    Indonesia
				                    
				                    @elseif($emp->location == 'NO')
				                    <img class="flag" src="{{asset('images/flags/no.svg')}}" alt="" title="Norway" data-tippy-placement="top">
				                    Norway
				                    
				                    @elseif($emp->location == 'OM')
				                    <img class="flag" src="{{asset('images/flags/om.svg')}}" alt="" title="Oman" data-tippy-placement="top">
				                    Oman
				                    
				                    @elseif($emp->location == 'PK')
				                    <img class="flag" src="{{asset('images/flags/pk.svg')}}" alt="" title="Pakistan" data-tippy-placement="top">
				                    Pakistan
				                    
				                    @elseif($emp->location == 'PW')
				                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="Palau" data-tippy-placement="top">
				                    Palau
				                    
				                    @elseif($emp->location == 'PA')
				                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="Panama" data-tippy-placement="top">
				                    Panama
				                    
				                    @elseif($emp->location == 'PG')
				                    <img class="flag" src="{{asset('images/flags/pg.svg')}}" alt="" title="Papua New Guinea" data-tippy-placement="top">
				                    Papua New Guinea
				                    
				                    @elseif($emp->location == 'PY')
				                    <img class="flag" src="{{asset('images/flags/py.svg')}}" alt="" title="Paraguay" data-tippy-placement="top">
				                    Paraguay
				                    
				                    @elseif($emp->location == 'PE')
				                    <img class="flag" src="{{asset('images/flags/pe.svg')}}" alt="" title="Peru" data-tippy-placement="top">
				                    Peru
				                    
				                    @elseif($emp->location == 'PH')
				                    <img class="flag" src="{{asset('images/flags/ph.svg')}}" alt="" title="Philippines" data-tippy-placement="top">
				                    Philippines
				                    
				                    @elseif($emp->location == 'PN')
				                    <img class="flag" src="{{asset('images/flags/pn.svg')}}" alt="" title="Pitcairn" data-tippy-placement="top">
				                    Pitcairn
				                    
				                    @elseif($emp->location == 'PL')
				                    <img class="flag" src="{{asset('images/flags/pl.svg')}}" alt="" title="Poland" data-tippy-placement="top">
				                    Poland
				                    
				                    @elseif($emp->location == 'PT')
				                    <img class="flag" src="{{asset('images/flags/pt.svg')}}" alt="" title="Portugal" data-tippy-placement="top">
				                    Portugal
				                     @elseif($emp->location == 'PR')
				                    <img class="flag" src="{{asset('images/flags/pr.svg')}}" alt="" title="Puerto Rico" data-tippy-placement="top">
				                    Puerto Rico
				                    
				                    @elseif($emp->location == 'QA')
				                    <img class="flag" src="{{asset('images/flags/qa.svg')}}" alt="" title="Qatar" data-tippy-placement="top">
				                    Qatar
				                    
				                    @elseif($emp->location == 'RE')
				                    <img class="flag" src="{{asset('images/flags/re.svg')}}" alt="" title="Réunion" data-tippy-placement="top">
				                    Réunion
				                    
				                    @elseif($emp->location == 'RO')
				                    <img class="flag" src="{{asset('images/flags/ro.svg')}}" alt="" title="Romania" data-tippy-placement="top">
				                    Romania
				                    
				                    @elseif($emp->location == 'RU')
				                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="Russian Federation" data-tippy-placement="top">
				                    Russian Federation
				                    
				                    @elseif($emp->location == 'RW')
				                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="Rwanda" data-tippy-placement="top">
				                    Rwanda
				                    
				                    @elseif($emp->location == 'SZ')
				                    <img class="flag" src="{{asset('images/flags/sz.svg')}}" alt="" title="Swaziland" data-tippy-placement="top">
				                    Swaziland
				                    
				                    @elseif($emp->location == 'SE')
				                    <img class="flag" src="{{asset('images/flags/se.svg')}}" alt="" title="Sweden" data-tippy-placement="top">
				                    Sweden
				                    
				                    @elseif($emp->location == 'CH')
				                    <img class="flag" src="{{asset('images/flags/ch.svg')}}" alt="" title="Switzerland" data-tippy-placement="top">
				                    Switzerland
				                    
				                    @elseif($emp->location == 'TR')
				                    <img class="flag" src="{{asset('images/flags/tr.svg')}}" alt="" title="Turkey" data-tippy-placement="top">
				                    Turkey
				                    
				                    @elseif($emp->location == 'TM')
				                    <img class="flag" src="{{asset('images/flags/tm.svg')}}" alt="" title="Turkmenistan" data-tippy-placement="top">
				                    Turkmenistan
				                    
				                    @elseif($emp->location == 'TV')
				                    <img class="flag" src="{{asset('images/flags/tv.svg')}}" alt="" title="Tuvalu" data-tippy-placement="top">
				                    Tuvalu
				                    
				                    @elseif($emp->location == 'UG')
				                    <img class="flag" src="{{asset('images/flags/ug.svg')}}" alt="" title="Uganda" data-tippy-placement="top">
				                    Uganda
				                    
				                    @elseif($emp->location == 'UA')
				                    <img class="flag" src="{{asset('images/flags/ua.svg')}}" alt="" title="Ukraine" data-tippy-placement="top">
				                    Ukraine
				                    
				                    @elseif($emp->location == 'GB')
				                    <img class="flag" src="{{asset('images/flags/gb.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
				                    United Kingdom
				                    
				                    @elseif($emp->location == 'US')
				                    <img class="flag" src="{{asset('images/flags/us.svg')}}" alt="" title="United States" data-tippy-placement="top">
				                    United States
				                    
				                    @elseif($emp->location == 'UY')
				                    <img class="flag" src="{{asset('images/flags/uy.svg')}}" alt="" title="Uruguay" data-tippy-placement="top">
				                    Uruguay
				                    
				                    @elseif($emp->location == 'UZ')
				                    <img class="flag" src="{{asset('images/flags/uz.svg')}}" alt="" title="Uzbekistan" data-tippy-placement="top">
				                    Uzbekistan
				                    
				                    @elseif($emp->location == 'YE')
				                    <img class="flag" src="{{asset('images/flags/ye.svg')}}" alt="" title="Yemen" data-tippy-placement="top">
				                    Yemen
				                    
				                    @elseif($emp->location == 'ZM')
				                    <img class="flag" src="{{asset('images/flags/zm.svg')}}" alt="" title="Zambia" data-tippy-placement="top">
				                    Zambia
				                    
				                    @elseif($emp->location == 'ZW')
				                    <img class="flag" src="{{asset('images/flags/zw.svg')}}" alt="" title="Zimbabwe" data-tippy-placement="top">
				                    Zimbabwe
				                    @elseif($emp->location == 'LB')
				                    <img class="flag" src="{{asset('images/flags/libya.svg')}}" alt="" title="Libya" data-tippy-placement="top">
				                    Libya
				                    @elseif($emp->location == 'Palestine')
				                    <img class="flag" src="{{asset('images/flags/Palestine-Flag.svg')}}" alt="" title="Palestine" data-tippy-placement="top">
				                    Palestine
				                    @elseif($emp->location == 'Emirates')
				                    <img class="flag" src="{{asset('images/flags/Emirates-flag.svg')}}" alt="" title="United Arab Emirates" data-tippy-placement="top">
				                    United Arab Emirates
				                    @elseif($emp->location == 'Syria')
				                    <img class="flag" src="{{asset('images/flags/Syria-Flag.svg')}}" alt="" title="Syria" data-tippy-placement="top">
				                    Syria

				                    @endif
								</li>
								<li><div class="verified-badge-with-title">Verified</div></li>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<!-- Breadcrumbs -->
						<nav id="breadcrumbs" class="white">
							<ul>
								<li><a href="{{route('home.page')}}">{{__('employer.Home')}}</a></li>
								<li><a href="#">{{__('employer.Browse Employer')}}</a></li>
								<li>{{$emp->full_name}}</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="background-image-container" style="background-image: url(&quot;images/single-company.jpg&quot;);"></div></div>
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<div class="single-page-section">
				<h3 class="margin-bottom-25">{{__('employer.About Employer')}}</h3>
				<p>{!!$emp->description!!}</p>
			</div>
			
			<!-- Boxed List -->
			<!-- <div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business-center"></i> Open Positions</h3>
				</div>

				<div class="listings-container compact-list-layout">
					 -->
					<!-- Job Listing -->
					<!-- <a href="single-job-page.html" class="job-listing"> -->

						<!-- Job Listing Details -->
						<!-- <div class="job-listing-details"> -->

							<!-- Details -->
							<!-- <div class="job-listing-description">
								<h3 class="job-listing-title">Python Developer</h3> -->

								<!-- Job Listing Footer -->
								<!-- <div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-location-on"></i> Berlin</li>
										<li><i class="icon-material-outline-business-center"></i> Full Time</li>
										<li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
									</ul>
								</div>
							</div>

						</div>
 -->
						<!-- Bookmark -->
						<!-- <span class="bookmark-icon"></span> -->
				<!-- 	</a>

				</div>

			</div> -->
			<!-- Boxed List / End -->

			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-thumb-up"></i>{{__('employer.Reviews')}} </h3>
				</div>
				<ul class="boxed-list-ul">
					
					@foreach($employerReviews as $employerReview)
					<li>
						<div class="boxed-list-item">
							<!-- Content -->
							<div class="item-content">
								<h4>Doing things the right way <span>{{__('employer.Anonymous Employee')}}</span></h4>
								<div class="item-details margin-top-10">
									@if($employerReview->rating == 1)
									<div class="star-rating" data-rating="1">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($employerReview->rating == 2)
									<div class="star-rating" data-rating="2">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($employerReview->rating == 3)
									<div class="star-rating" data-rating="3">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($employerReview->rating == 4)
									<div class="star-rating" data-rating="4">
										<!-- <span class="star"></span> -->
									</div>
									@elseif($employerReview->rating == 5)
									<div class="star-rating" data-rating="5">
										<!-- <span class="star"></span> -->
									</div>
									@endif
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> {{ \Carbon\Carbon::parse($employerReview->created_at)->format('d/m/Y')}}</div>
								</div>
								<div class="item-description">
									<p>{{$employerReview->comment}}</p>
								</div>
							</div>
						</div>
					</li>
					@endforeach
					
				</ul>

				<!-- <div class="centered-button margin-top-35">
					<a href="#small-dialog" class="popup-with-zoom-anim button button-sliding-icon">Leave a Review <i class="icon-material-outline-arrow-right-alt"></i></a>
				</div> -->
<div class="d-felx justify-content-center">

		            {{ $employerReviews->links('pagination::bootstrap-4') }}

		        </div>
			</div>
			
			<!-- Boxed List / End -->

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>{{__('freelancer.Social Profiles')}}</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
							@if($emp->socialMedia->facebook !== null)
							<li>
						<a href="{{$emp->socialMedia->facebook}}" target="_blank" title="Facebook" data-tippy-placement="top">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					@endif
					@if($emp->socialMedia->twitter !== null)
					<li>
						<a href="{{$emp->socialMedia->twitter}}" target="_blank" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					@endif
					@if($emp->socialMedia->google_plus !== null)
					<li>
						<a href="{{$emp->socialMedia->google_plus}}" target="_blank" title="Google Plus" data-tippy-placement="top">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					@endif
					@if($emp->socialMedia->linkedin !== null)
					<li>
						<a href="{{$emp->socialMedia->linkedin}}" target="_blank" title="LinkedIn" data-tippy-placement="top">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
						@endif
						</ul>
					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					@if( Route::has('login'))
          <!-- Sidebar Widget -->
        
                  		@auth
                    		
                        <a href="#small-dialog-2{{$emp->id}}" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> {{__('freelancer.Send Message')}}</a>
                          <!-- Send Direct Message Popup
================================================== -->
<div id="small-dialog-2{{$emp->id}}" class="zoom-anim-dialog mfp-hide dialog-with-tabs poup pop">

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
          <h3>{{__('freelancer.Direct Message To')}} {{$emp->full_name}}</h3>
        </div>
          
        <!-- Form -->
        <form method="post" id="send-pm" action="{{route('send.message.emp',$emp->id)}}">
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
						 <a href="{{route('message.not.send')}}" class="button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>
		                  @endif
		                  @else
		                 
		                  
		                @endif
					<!-- <h3>Bookmark or Share</h3> -->

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
								<li><a href="#" data-button-color="#3b5998" data-tippy-placement="top" data-tippy="" data-original-title="Share on Facebook" style="background-color: rgb(59, 89, 152);"><i class="icon-brand-facebook-f"></i></a></li>
								<li><a href="#" data-button-color="#1da1f2" data-tippy-placement="top" data-tippy="" data-original-title="Share on Twitter" style="background-color: rgb(29, 161, 242);"><i class="icon-brand-twitter"></i></a></li>
								<li><a href="#" data-button-color="#dd4b39" data-tippy-placement="top" data-tippy="" data-original-title="Share on Google Plus" style="background-color: rgb(221, 75, 57);"><i class="icon-brand-google-plus-g"></i></a></li>
								<li><a href="#" data-button-color="#0077b5" data-tippy-placement="top" data-tippy="" data-original-title="Share on LinkedIn" style="background-color: rgb(0, 119, 181);"><i class="icon-brand-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection