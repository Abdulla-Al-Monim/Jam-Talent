@extends('frontend.layout.template')
@section('title')
{{$task->task_name}}
@endsection
@section('meta')
@php
$employer= App\Models\User::where('id',$task->employer_id)->first();
@endphp
<meta property="og:title" content="{{$task->task_name}}" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:image" content="{{URL::to($employer->image)}}" />
  <meta property="og:description" content="{{$employer->sort_description}}" />
  <meta property="og:site_name" content="ShareThis" />
@endsection
@section('body-content')
@php
$employer= App\Models\User::where('id',$task->employer_id)->first();
@endphp
<div class="single-page-header" data-background-image="images/single-task.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><a href="{{route('single.employer.profile',$task->employer_id)}}">
							@if($employer->image == null)
							<img src="{{asset('images/default.jpeg')}}" alt="">
							@else
							<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
							@endif</a></div>
						<div class="header-details">
							<h3>{{$task->task_name}}</h3>
							<h5>{{__('task.About the Employer')}}</h5>
							<ul>
								<li><a href="{{route('single.employer.profile',$task->employer_id)}}"><i class="icon-material-outline-business"></i>
									@if($employer->full_name == null)
									Unknown
									@else
										{{$employer->full_name}}
									@endif
								</a></li>
								<li><div class="star-rating" data-rating="{{$employer->employerActivity->average_rating}}"></div></li>
								<li><img class="flag" src="images/flags/de.svg" alt=""> {{$employer->location}}
								    @if($employer->location == 'AR')
				                    <img class="flag" src="{{asset('images/flags/ar.svg')}}" alt="" title="Argentina" data-tippy-placement="top"> Argentina
				                    
				                    @elseif($employer->location == 'AM')
				                    <img class="flag" src="{{asset('images/flags/am.svg')}}" alt="" title="Armenia" data-tippy-placement="top">
				                    Armenia

				                    @elseif($employer->location == 'AW')
				                    <img class="flag" src="{{asset('images/flags/aw.svg')}}" alt="" title="Aruba" data-tippy-placement="top">
				                    Aruba

				                    @elseif($employer->location == 'AU')
				                    <img class="flag" src="{{asset('images/flags/au.svg')}}" alt="" title="Australia" data-tippy-placement="top">
				                    Australia

				                    @elseif($employer->location == 'AT')
				                    <img class="flag" src="{{asset('images/flags/at.svg')}}" alt="" title="Austria" data-tippy-placement="top">
				                    Austria

				                    @elseif($employer->location == 'AZ')
				                    <img class="flag" src="{{asset('images/flags/az.svg')}}" alt="" title="Azerbaijan" data-tippy-placement="top">
				                    Azerbaijan

				                    @elseif($employer->location == 'BS')
				                    <img class="flag" src="{{asset('images/flags/bs.svg')}}" alt="" title="Bahamas" data-tippy-placement="top">
				                    Bahamas

				                    @elseif($employer->location == 'BH')
				                    <img class="flag" src="{{asset('images/flags/bh.svg')}}" alt="" title="Bahrain" data-tippy-placement="top">
				                    Bahrain

				                    @elseif($employer->location == 'BD')
				                    <img class="flag" src="{{asset('images/flags/bd.svg')}}" alt="" title="Bangladesh" data-tippy-placement="top">
				                    Bangladesh

				                    @elseif($employer->location == 'BB')
				                    <img class="flag" src="{{asset('images/flags/bb.svg')}}" alt="" title="Barbados" data-tippy-placement="top">
				                    Barbados

				                    @elseif($employer->location == 'BY')
				                    <img class="flag" src="{{asset('images/flags/by.svg')}}" alt="" title="Belarus" data-tippy-placement="top">
				                    Belarus

				                    @elseif($employer->location == 'BE')
				                    <img class="flag" src="{{asset('images/flags/be.svg')}}" alt="" title="Belgium" data-tippy-placement="top">
				                    Belgium

				                    @elseif($employer->location == 'BZ')
				                    <img class="flag" src="{{asset('images/flags/bz.svg')}}" alt="" title="Belize" data-tippy-placement="top">
				                    Belize

				                    @elseif($employer->location == 'BJ')
				                    <img class="flag" src="{{asset('images/flags/bj.svg')}}" alt="" title="Benin" data-tippy-placement="top">
				                    Benin

				                    @elseif($employer->location == 'BM')
				                    <img class="flag" src="{{asset('images/flags/bm.svg')}}" alt="" title="Bermuda" data-tippy-placement="top">
				                    Bermuda

				                    @elseif($employer->location == 'BT')
				                    <img class="flag" src="{{asset('images/flags/bt.svg')}}" alt="" title="Bhutan" data-tippy-placement="top">
				                    Bhutan

				                    @elseif($employer->location == 'BG')
				                    <img class="flag" src="{{asset('images/flags/bg.svg')}}" alt="" title="Bulgaria" data-tippy-placement="top">
				                    Bulgaria

				                    @elseif($employer->location == 'BF')
				                    <img class="flag" src="{{asset('images/flags/bf.svg')}}" alt="" title="Burkina Faso" data-tippy-placement="top">
				                    Burkina Faso


				                    @elseif($employer->location == 'BI')
				                    <img class="flag" src="{{asset('images/flags/bi.svg')}}" alt="" title="Burundi" data-tippy-placement="top">
				                    Burundi

				                    @elseif($employer->location == 'KH')
				                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="Cambodia" data-tippy-placement="top">
				                    Cambodia

				                    @elseif($employer->location == 'CM')
				                    <img class="flag" src="{{asset('images/flags/kh.svg')}}" alt="" title="Cameroon" data-tippy-placement="top">
				                    Cameroonemployer

				                    @elseif($employer->location == 'CA')
				                    <img class="flag" src="{{asset('images/flags/ca.svg')}}" alt="" title="Canada" data-tippy-placement="top">
				                    Canada

				                    @elseif($employer->location == 'CV')
				                    <img class="flag" src="{{asset('images/flags/cv.svg')}}" alt="" title="Cape Verde" data-tippy-placement="top">
				                    Cape Verde

				                    @elseif($employer->location == 'KY')
				                    <img class="flag" src="{{asset('images/flags/ky.svg')}}" alt="" title="Cayman Islands" data-tippy-placement="top">
				                    Cayman Islands

				                    @elseif($employer->location == 'CO')
				                    <img class="flag" src="{{asset('images/flags/co.svg')}}" alt="" title="Colombia" data-tippy-placement="top">
				                    Colombia

				                    @elseif($employer->location == 'KM')
				                    <img class="flag" src="{{asset('images/flags/km.svg')}}" alt="" title="Comoros" data-tippy-placement="top">
				                    Comoros

				                    @elseif($employer->location == 'CG')
				                    <img class="flag" src="{{asset('images/flags/cg.svg')}}" alt="" title="Congo" data-tippy-placement="top">
				                    Congo

				                    @elseif($employer->location == 'CK')
				                    <img class="flag" src="{{asset('images/flags/ck.svg')}}" alt="" title="Cook Islands" data-tippy-placement="top">
				                    Cook Islands

				                    @elseif($employer->location == 'CR')
				                    <img class="flag" src="{{asset('images/flags/cr.svg')}}" alt="" title="Costa Rica" data-tippy-placement="top">
				                    Costa Rica
				                    
				                    @elseif($employer->location == 'CI')
				                    <img class="flag" src="{{asset('images/flags/ci.svg')}}" alt="" title="Côte d'Ivoire" data-tippy-placement="top">
				                    Côte d'Ivoire
				                    
				                    @elseif($employer->location == 'HR')
				                    <img class="flag" src="{{asset('images/flags/hr.svg')}}" alt="" title="Croatia" data-tippy-placement="top">
				                    Croatia
				                    
				                    @elseif($employer->location == 'CU')
				                    <img class="flag" src="{{asset('images/flags/cu.svg')}}" alt="" title="Cuba" data-tippy-placement="top">
				                    Cuba
				                    
				                    @elseif($employer->location == 'CW')
				                    <img class="flag" src="{{asset('images/flags/cw.svg')}}" alt="" title="Curaçao" data-tippy-placement="top">
				                    Curaçao
				                    
				                    @elseif($employer->location == 'CY')
				                    <img class="flag" src="{{asset('images/flags/cy.svg')}}" alt="" title="Cyprus" data-tippy-placement="top">
				                    Cyprus
				                    
				                    @elseif($employer->location == 'CZ')
				                    <img class="flag" src="{{asset('images/flags/cz.svg')}}" alt="" title="Czech Republic" data-tippy-placement="top">
				                    Czech Republic
				                    
				                    @elseif($employer->location == 'DK')
				                    <img class="flag" src="{{asset('images/flags/dk.svg')}}" alt="" title="Denmark" data-tippy-placement="top">
				                    Denmark
				                    
				                    @elseif($employer->location == 'DJ')
				                    <img class="flag" src="{{asset('images/flags/dj.svg')}}" alt="" title="Djibouti" data-tippy-placement="top">
				                    Djibouti
				                    
				                    @elseif($employer->location == 'DM')
				                    <img class="flag" src="{{asset('images/flags/dm.svg')}}" alt="" title="Dominica" data-tippy-placement="top">
				                    Dominica
				                    
				                    @elseif($employer->location == 'DO')
				                    <img class="flag" src="{{asset('images/flags/do.svg')}}" alt="" title="Dominican Republic" data-tippy-placement="top">
				                    Dominican Republic
				                    
				                    @elseif($employer->location == 'EC')
				                    <img class="flag" src="{{asset('images/flags/ec.svg')}}" alt="" title="Ecuador" data-tippy-placement="top">
				                    Ecuador
				                    
				                    @elseif($employer->location == 'EG')
				                    <img class="flag" src="{{asset('images/flags/eg.svg')}}" alt="" title="Egypt" data-tippy-placement="top">
				                    Egypt
				                    
				                    @elseif($employer->location == 'GP')
				                    <img class="flag" src="{{asset('images/flags/gp.svg')}}" alt="" title="Guadeloupe" data-tippy-placement="top">
				                    Guadeloupe
				                    
				                    @elseif($employer->location == 'GU')
				                    <img class="flag" src="{{asset('images/flags/gu.svg')}}" alt="" title="Guam" data-tippy-placement="top">
				                    Guam
				                    
				                    @elseif($employer->location == 'GT')
				                    <img class="flag" src="{{asset('images/flags/gt.svg')}}" alt="" title="Guatemala" data-tippy-placement="top">
				                    Guatemala
				                    
				                    @elseif($employer->location == 'GG')
				                    <img class="flag" src="{{asset('images/flags/gg.svg')}}" alt="" title="Guernsey" data-tippy-placement="top">
				                    Guernsey
				                    
				                    @elseif($employer->location == 'GN')
				                    <img class="flag" src="{{asset('images/flags/gn.svg')}}" alt="" title="Guinea" data-tippy-placement="top">
				                    Guinea
				                    
				                    @elseif($employer->location == 'GW')
				                    <img class="flag" src="{{asset('images/flags/gw.svg')}}" alt="" title="Guinea-Bissau" data-tippy-placement="top">
				                    Guinea-Bissau
				                    
				                    @elseif($employer->location == 'GY')
				                    <img class="flag" src="{{asset('images/flags/gy.svg')}}" alt="" title="Guyana" data-tippy-placement="top">
				                    Guyana
				                    
				                    @elseif($employer->location == 'HT')
				                    <img class="flag" src="{{asset('images/flags/ht.svg')}}" alt="" title="Haiti" data-tippy-placement="top">
				                    Haiti
				                    
				                    @elseif($employer->location == 'HN')
				                    <img class="flag" src="{{asset('images/flags/hn.svg')}}" alt="" title="Honduras" data-tippy-placement="top">
				                    Honduras
				                    
				                    @elseif($employer->location == 'HK')
				                    <img class="flag" src="{{asset('images/flags/hk.svg')}}" alt="" title="Hong Kong" data-tippy-placement="top">
				                    Hong Kong
				                    
				                    @elseif($employer->location == 'HU')
				                    <img class="flag" src="{{asset('images/flags/hu.svg')}}" alt="" title="Hungary" data-tippy-placement="top">
				                    Hungary
				                    
				                    @elseif($employer->location == 'IS')
				                    <img class="flag" src="{{asset('images/flags/is.svg')}}" alt="" title="Iceland" data-tippy-placement="top">
				                    Iceland
				                    
				                    @elseif($employer->location == 'IN')
				                    <img class="flag" src="{{asset('images/flags/in.svg')}}" alt="" title="India" data-tippy-placement="top">
				                    India
				                    
				                    @elseif($employer->location == 'ID')
				                    <img class="flag" src="{{asset('images/flags/id.svg')}}" alt="" title="Indonesia" data-tippy-placement="top">
				                    Indonesia
				                    
				                    @elseif($employer->location == 'NO')
				                    <img class="flag" src="{{asset('images/flags/no.svg')}}" alt="" title="Norway" data-tippy-placement="top">
				                    Norway
				                    
				                    @elseif($employer->location == 'OM')
				                    <img class="flag" src="{{asset('images/flags/om.svg')}}" alt="" title="Oman" data-tippy-placement="top">
				                    Oman
				                    
				                    @elseif($employer->location == 'PK')
				                    <img class="flag" src="{{asset('images/flags/pk.svg')}}" alt="" title="Pakistan" data-tippy-placement="top">
				                    Pakistan
				                    
				                    @elseif($employer->location == 'PW')
				                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="Palau" data-tippy-placement="top">
				                    Palau
				                    
				                    @elseif($employer->location == 'PA')
				                    <img class="flag" src="{{asset('images/flags/pa.svg')}}" alt="" title="Panama" data-tippy-placement="top">
				                    Panama
				                    
				                    @elseif($employer->location == 'PG')
				                    <img class="flag" src="{{asset('images/flags/pg.svg')}}" alt="" title="Papua New Guinea" data-tippy-placement="top">
				                    Papua New Guinea
				                    
				                    @elseif($employer->location == 'PY')
				                    <img class="flag" src="{{asset('images/flags/py.svg')}}" alt="" title="Paraguay" data-tippy-placement="top">
				                    Paraguay
				                    
				                    @elseif($employer->location == 'PE')
				                    <img class="flag" src="{{asset('images/flags/pe.svg')}}" alt="" title="Peru" data-tippy-placement="top">
				                    Peru
				                    
				                    @elseif($employer->location == 'PH')
				                    <img class="flag" src="{{asset('images/flags/ph.svg')}}" alt="" title="Philippines" data-tippy-placement="top">
				                    Philippines
				                    
				                    @elseif($employer->location == 'PN')
				                    <img class="flag" src="{{asset('images/flags/pn.svg')}}" alt="" title="Pitcairn" data-tippy-placement="top">
				                    Pitcairn
				                    
				                    @elseif($employer->location == 'PL')
				                    <img class="flag" src="{{asset('images/flags/pl.svg')}}" alt="" title="Poland" data-tippy-placement="top">
				                    Poland
				                    
				                    @elseif($employer->location == 'PT')
				                    <img class="flag" src="{{asset('images/flags/pt.svg')}}" alt="" title="Portugal" data-tippy-placement="top">
				                    Portugal
				                     @elseif($employer->location == 'PR')
				                    <img class="flag" src="{{asset('images/flags/pr.svg')}}" alt="" title="Puerto Rico" data-tippy-placement="top">
				                    Puerto Rico
				                    
				                    @elseif($employer->location == 'QA')
				                    <img class="flag" src="{{asset('images/flags/qa.svg')}}" alt="" title="Qatar" data-tippy-placement="top">
				                    Qatar
				                    
				                    @elseif($employer->location == 'RE')
				                    <img class="flag" src="{{asset('images/flags/re.svg')}}" alt="" title="Réunion" data-tippy-placement="top">
				                    Réunion
				                    
				                    @elseif($employer->location == 'RO')
				                    <img class="flag" src="{{asset('images/flags/ro.svg')}}" alt="" title="Romania" data-tippy-placement="top">
				                    Romania
				                    
				                    @elseif($employer->location == 'RU')
				                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="Russian Federation" data-tippy-placement="top">
				                    Russian Federation
				                    
				                    @elseif($employer->location == 'RW')
				                    <img class="flag" src="{{asset('images/flags/ru.svg')}}" alt="" title="Rwanda" data-tippy-placement="top">
				                    Rwanda
				                    
				                    @elseif($employer->location == 'SZ')
				                    <img class="flag" src="{{asset('images/flags/sz.svg')}}" alt="" title="Swaziland" data-tippy-placement="top">
				                    Swaziland
				                    
				                    @elseif($employer->location == 'SE')
				                    <img class="flag" src="{{asset('images/flags/se.svg')}}" alt="" title="Sweden" data-tippy-placement="top">
				                    Sweden
				                    
				                    @elseif($employer->location == 'CH')
				                    <img class="flag" src="{{asset('images/flags/ch.svg')}}" alt="" title="Switzerland" data-tippy-placement="top">
				                    Switzerland
				                    
				                    @elseif($employer->location == 'TR')
				                    <img class="flag" src="{{asset('images/flags/tr.svg')}}" alt="" title="Turkey" data-tippy-placement="top">
				                    Turkey
				                    
				                    @elseif($employer->location == 'TM')
				                    <img class="flag" src="{{asset('images/flags/tm.svg')}}" alt="" title="Turkmenistan" data-tippy-placement="top">
				                    Turkmenistan
				                    
				                    @elseif($employer->location == 'TV')
				                    <img class="flag" src="{{asset('images/flags/tv.svg')}}" alt="" title="Tuvalu" data-tippy-placement="top">
				                    Tuvalu
				                    
				                    @elseif($employer->location == 'UG')
				                    <img class="flag" src="{{asset('images/flags/ug.svg')}}" alt="" title="Uganda" data-tippy-placement="top">
				                    Uganda
				                    
				                    @elseif($employer->location == 'UA')
				                    <img class="flag" src="{{asset('images/flags/ua.svg')}}" alt="" title="Ukraine" data-tippy-placement="top">
				                    Ukraine
				                    
				                    @elseif($employer->location == 'GB')
				                    <img class="flag" src="{{asset('images/flags/gb.svg')}}" alt="" title="United Kingdom" data-tippy-placement="top">
				                    United Kingdom
				                    
				                    @elseif($employer->location == 'US')
				                    <img class="flag" src="{{asset('images/flags/us.svg')}}" alt="" title="United States" data-tippy-placement="top">
				                    United States
				                    
				                    @elseif($employer->location == 'UY')
				                    <img class="flag" src="{{asset('images/flags/uy.svg')}}" alt="" title="Uruguay" data-tippy-placement="top">
				                    Uruguay
				                    
				                    @elseif($employer->location == 'UZ')
				                    <img class="flag" src="{{asset('images/flags/uz.svg')}}" alt="" title="Uzbekistan" data-tippy-placement="top">
				                    Uzbekistan
				                    
				                    @elseif($employer->location == 'YE')
				                    <img class="flag" src="{{asset('images/flags/ye.svg')}}" alt="" title="Yemen" data-tippy-placement="top">
				                    Yemen
				                    
				                    @elseif($employer->location == 'ZM')
				                    <img class="flag" src="{{asset('images/flags/zm.svg')}}" alt="" title="Zambia" data-tippy-placement="top">
				                    Zambia
				                    
				                    @elseif($employer->location == 'ZW')
				                    <img class="flag" src="{{asset('images/flags/zw.svg')}}" alt="" title="Zimbabwe" data-tippy-placement="top">
				                    Zimbabwe
				                    @elseif($employer->location == 'LB')
				                    <img class="flag" src="{{asset('images/flags/libya.svg')}}" alt="" title="Libya" data-tippy-placement="top">
				                    Libya
				                    @elseif($employer->location == 'Syria')
				                    <img class="flag" src="{{asset('images/flags/Syria-Flag.svg')}}" alt="" title="Libya" data-tippy-placement="top">
				                    Syria
				                    @elseif($employer->location == 'Palestine')
				                    <img class="flag" src="{{asset('images/flags/Palestine-Flag.svgPalestine')}}" alt="" title="Palestine" data-tippy-placement="top">
				                    Palestine
				                    @elseif($employer->location == 'Emirates')
				                    <img class="flag" src="{{asset('images/flags/Emirates-flag.svg')}}" alt="" title="United Arab Emirates" data-tippy-placement="top">
				                    United Arab Emirates
				                    @endif</li>
								<li><div class="verified-badge-with-title">{{__('task.Verified')}}</div></li>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<div class="salary-box">
							<div class="salary-type">{{__('task.Project Budget')}}</div>
							<div class="salary-amount">${{$task->min_budget}} - ${{$task->max_budget}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">
			
			<!-- Description -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">{{__('task.Project Description')}}</h3>
				{!!$task->description!!}
			</div>

			<!-- Atachments -->
			<div class="single-page-section">
				<h3>{{__('freelancer.Attachments')}}</h3>
				<div class="attachments-container">
					<a href="{{route('download.documentt.task.freelancer',$task->id)}}" class="attachment-box ripple-effect"><span>{{__('task.Project Brief')}} </span><i>PDF</i></a>
				</div>
			</div>

			<!-- Skills -->
			<!-- <div class="single-page-section">
				<h3>Skills Required</h3>
				<div class="task-tags">
					<span>iOS</span>
					<span>Android</span>
					<span>mobile apps</span>
					<span>design</span>
				</div>
			</div> -->
			<div class="clearfix"></div>
			
			<!-- Freelancers Bidding -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-group"></i>{{__('task.Freelancers Bidding')}} </h3>
				</div>
				<ul class="boxed-list-ul">
					@foreach(App\Models\Backend\TaskApply::where('task_id',$task->id)->get() as $taskApply)
					<li>
						<div class="bid">
							@foreach(App\Models\User::where('id',$taskApply->freelancer_id)->get() as $freelancer)
							

							<!-- Avatar -->
							<div class="bids-avatar">
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
							</div>
							
							<!-- Content -->
							<div class="bids-content">
								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="{{route('single.freelancer.profile',$freelancer->id)}}">{{$freelancer->full_name}} <img class="flag" src="images/flags/gb.svg" alt="" title="United Kingdom" data-tippy-placement="top"></a></h4>
									<div class="star-rating" data-rating="
									@if($freelancer->freelancerActivity)
									{{$freelancer->freelancerActivity->average_rating}}
									@endif
									"></div>
								</div>
							</div>
							@endforeach
							<!-- Bid -->
							<div class="bids-bid">
								<div class="bid-rate">
									<div class="rate">${{ $taskApply->min_budget}}</div>
									@if($taskApply->delivery_type == 0)
									<span>in {{$taskApply->delivary_time}} hours</span>
									@elseif($taskApply->delivery_type == 1)
									<span>in {{$taskApply->delivary_time}} days</span>
									@endif
									
								</div>
							</div>
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<div class="countdown green margin-bottom-35">{{$task->created_at->diffForHumans()}}</div>

				<div class="sidebar-widget">
					<div class="bidding-widget">
						@if( Route::has('login'))
						@auth
						@if(Auth::user()->user_type_id == 1)
						@php 
						
							$count = App\Models\Backend\TaskApply::where('freelancer_id',Auth::user()->id)->where('task_id',$task->id)->count();

						@endphp
						@if($count == 0)
						<div class="bidding-headline"><h3>{{__('task.Bid on this job')}} </h3></div>
						<div class="bidding-inner">
							<form action="{{route('task.apply',$task->id)}}" method="POST">
								@csrf
								<!-- Headline -->
								<span class="bidding-detail">{{__('task.Set your')}}  <strong>{{__('task.minimal rate')}} </strong></span>

								<!-- Price Slider -->
								<div class="bidding-value">$<span id="biddingVal"></span></div>
								<!-- <input class="bidding-slider" name="min_budget" type="text" value="$task->max_budget" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{$task->min_budget}}" data-slider-max="{{$task->max_budget}}" data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide" /> -->
								@php
								$b =  $task->max_budget - $task->min_budget;
								@endphp

								<input class="bidding-slider" type="text" value="7" name="min_budget" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{$task->min_budget}}" data-slider-max="{{$task->max_budget}}" data-slider-value="35" data-slider-step="1" data-slider-tooltip="hide" />
								<!-- Headline -->
								<span class="bidding-detail margin-top-30">{{__('task.Set your')}} <strong>{{__('task.delivery time')}}</strong></span>

								<!-- Fields -->
								<div class="bidding-fields">
									<div class="bidding-field">
										<!-- Quantity Buttons -->
										<div class="qtyButtons">
											<div class="qtyDec"></div>
											<input type="text" name="qtyInput" value="1">
											<div class="qtyInc"></div>
										</div>
									</div>
									<div class="bidding-field">
										<select class=" default" style="padding-right: 20px;" name="delivery_type">
											<option selected value="1">{{__('task.Days')}}</option>
											<!-- <option value="0">Hours</option> -->
										</select>
									</div>
								</div>

								<!-- Button -->
								<button id="snackbar-place-bid" class="button ripple-effect move-on-hover full-width margin-top-30" type="submit"><span>{{__('task.Place a Bid')}}</span></button>
							</form>
							

						</div>
						@else
						<div class="bidding-headline"><h3>{{__('task.You are Already bid this job')}}!</h3></div>
						
						@endif
						@endif
						@endif
						@endif
						<div class="bidding-signup">{{__('task.Dont have an account?')}} <a href="{{route('register.create')}}" class=" sign-in">{{__('task.Sign Up')}}</a></div>
					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<h3>{{__('task.Bookmark or Share')}}</h3>

					<!-- Bookmark Button -->
					@if( Route::has('login'))
	                  @auth
	                    @if( Auth::user()->user_type_id == 1 )
	                    @php
                      	$count = App\Models\Backend\BookMarkTask::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('task_id',$task->id)->count();
                      	@endphp
                      	@if($count == 0)
							<!-- Bookmark Button -->
							<form method="POST" action="{{route('bookmark.task',$task->id)}}">
								@csrf
							<button class="bookmarkbButton margin-bottom-25" type="submit">
								<span class="bookmark-text">{{__('freelancer.Bookmark')}}</span>
							</button>
							</form>
						@else
						<!-- bookmark -->
						@php
                      	$bookmark = App\Models\Backend\BookMarkTask::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('task_id',$task->id)->first();
                      	@endphp
							<form method="POST" action="{{route('bookmark.task.remove',$bookmark->id)}}">
								@csrf
							<button class="bookmarkbButton margin-bottom-25 backgroundColor" type="submit">
								<span class="bookmark-text">{{__('freelancer.Bookmarked')}}</span>
							</button>
							</form>

							@endif
						@endif
	                  @endif
	                @endif
					<!-- <button class="bookmark-button margin-bottom-25">
						<span class="bookmark-icon"></span>
						<span class="bookmark-text">Bookmark</span>
						<span class="bookmarked-text">Bookmarked</span>
					</button> -->

					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
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
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection