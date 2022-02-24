@extends('frontend.layout.template')
@section('title')
{{$Job->job_title}}
@endsection
@section('meta')
<meta property="og:title" content="{{$Job->job_title}}" />
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  	@php
		$employer = App\Models\User::where('id',$Job->user_id)->first();
	@endphp
  <meta property="og:image" content="{{URL::to($employer->image)}}" />
  <meta property="og:description" content="{{$employer->sort_description}}" />
  <meta property="og:site_name" content="ShareThis" />
@endsection
@section('body-content')
<div class="single-page-header" data-background-image="images/single-job.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					@php
					$employer = App\Models\User::where('id',$Job->user_id)->first();
					@endphp
					
					<div class="left-side">
						<div class="header-image"><a href="{{route('single.employer.profile',$Job->user_id)}}">
							@if($employer->image == null)
							<img src="{{asset('images/default.jpeg')}}" alt="">
							@else
							<img src="{{ asset('images/employer/' . $employer->image)}}" alt="">
							@endif
						</a></div>
						<div class="header-details">
							<h3>{{$Job->job_title}}</h3>
							<h5>{{__('job.About the Employer')}}</h5>
							
							<ul>
								<li><a href="{{route('single.employer.profile',$Job->user_id)}}">

									@if($employer->full_name == null)
									<i class="icon-material-outline-business"></i> 
									Unknown
									{{$employer->full_name}}
									@else
									<i class="icon-material-outline-business"></i> 
									{{$employer->full_name}}
									@endif
								</a>
								</li>
								<li><div class="star-rating" data-rating="{{$employer->employerActivity->average_rating}}"></div></li>
								<li>
									
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
				                    Cameroon

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
				                    @elseif($employer->location == 'Syria')
				                    <img class="flag" src="{{asset('images/flags/Syria-Flag.svg')}}" alt="" title="Libya" data-tippy-placement="top">
				                    Syria
				                    @elseif($employer->location == 'Palestine')
				                    <img class="flag" src="{{asset('images/flags/Palestine-Flag.svg')}}" alt="" title="Palestine" data-tippy-placement="top">
				                    Palestine
				                    @elseif($employer->location == 'Emirates')
				                    <img class="flag" src="{{asset('images/flags/Emirates-flag.svg')}}" alt="" title="United Arab Emirates" data-tippy-placement="top">
				                    United Arab Emirates
				                    @endif
								</li>
								<li><div class="verified-badge-with-title">{{__('task.Verified')}}</div></li>
							</ul>
							
						</div>
					</div>
					
					<div class="right-side">
						<div class="salary-box">
							<div class="salary-type">{{__('job.Project Budget')}}</div>
							<div class="salary-amount">${{$Job->min_salary}} - ${{$Job->max_salary}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="background-image-container" style="background-image: url(&quot;images/single-job.jpg&quot;);"></div></div>
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<div class="single-page-section">
				<h3 class="margin-bottom-25">{{__('job.Job Description')}}</h3>
				{!!$Job->description!!}
			</div>

			<!-- <div class="single-page-section">
				<h3 class="margin-bottom-30">Location</h3>
				<div id="single-job-map-container">
					<div id="singleListingMap" data-latitude="51.507717" data-longitude="-0.131095" data-map-icon="im im-icon-Hamburger" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" aria-label="Map" aria-roledescription="map" role="group" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -17, -38);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -17, -38);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16372!3i10896!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=49212" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16371!3i10896!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=52145" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16371!3i10895!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=16451" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16372!3i10895!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=13518" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16373!3i10895!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=10585" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16373!3i10896!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=46279" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16370!3i10896!4i256!2m3!1e0!2sm!3i546272096!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=37026" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i16370!3i10895!4i256!2m3!1e0!2sm!3i546272108!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;token=19384" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"><div class="map-marker-container" data-marker_id="1" style="left: 0.265095px; top: 0.391447px;"><div class="marker-container"><div class="marker-card"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div><div></div><div></div><div></div><div></div><div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;"></button></div><div></div><div></div><div><div style="padding: 5px; z-index: 0; position: absolute; right: 0px; top: 124px;"><div><div class="custom-zoom-in"></div><div class="custom-zoom-out"></div></div></div></div><div></div><div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="0" controlheight="0" style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 14px; right: 0px;"><div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;"><div style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;"><button draggable="false" title="Rotate map clockwise" aria-label="Rotate map clockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" title="Rotate map counterclockwise" aria-label="Rotate map counterclockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20width%3D%2224%22%3E%0A%20%20%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22%2F%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 20px; height: 20px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;"></button></div></div></div></div><div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=51.507717,-0.131095&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Open this area in Google Maps (opens a new window)" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div></div><div></div><div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 186px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2021 Google</span></div></div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@51.507717,-0.131095,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2021 Google</div></div></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 148px; top: 80px;"><div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">Map Data</div><div style="font-size: 13px;">Map data ©2021 Google</div><button draggable="false" title="Close" aria-label="Close" type="button" class="gm-ui-hover-effect" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;"></button></div></div></div><div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"><div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div><div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span></div><table style="width: 100%;"><tr><td style="line-height: 16px; vertical-align: middle;"><a href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this website?</a></td><td style="text-align: right;"><button class="dismissButton">OK</button></td></tr></table></div></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div> -->

			<div class="single-page-section">
				<h3 class="margin-bottom-25">{{__('job.Similar Jobs')}}</h3>

				<!-- Listings Container -->
				<div class="listings-container grid-layout">
					@foreach(App\Models\backend\Job::orderBy('id','desc')->where('job_category',$Job->job_category)->paginate(2) as $simillerJob)


					@php

					$similleremployer = App\Models\User::where('id',$simillerJob->user_id)->first();

					@endphp
					@if($similleremployer)
						<!-- Job Listing -->

						@if($Job->id !== $simillerJob->id)

						<a href="{{route('job.show',$simillerJob->id)}}" class="job-listing">

							<!-- Job Listing Details -->
							<div class="job-listing-details">
								<!-- Logo -->
								<div class="job-listing-company-logo">
									@if($similleremployer->image == null)
									<img src="{{asset('images/default.jpeg')}}" alt="">
									@else
									<img src="{{ asset('images/employer/' . $simillerJob->image)}}" alt="">
									@endif
								</div>

								<!-- Details -->
								<div class="job-listing-description">
									@if($similleremployer->full_name == null)
									<h4 class="job-listing-company">Unknown</h4>
									@else
									<h4 class="job-listing-company">
										{{$similleremployer->full_name}}
									</h4>
									@endif
									<h3 class="job-listing-title">{{$simillerJob->job_title}}</h3>
									
								</div>
							</div>

							<!-- Job Listing Footer -->
							<div class="job-listing-footer">
								<ul>
									<!-- <li><i class="icon-material-outline-location-on"></i> San Francisco</li> -->
									<li><i class="icon-material-outline-business-center"></i> <!-- {{$simillerJob->job_type}} -->
										@if($simillerJob->job_type === "Full Time")
									{{__('backendJob.Full Time')}}
									@elseif($simillerJob->job_type == "Freelance")
									{{__('backendJob.Freelance')}}
									@elseif($simillerJob->job_type == "Part Time")
									{{__('backendJob.Part Time')}}
									@elseif($simillerJob->job_type == "Internship")
									{{__('backendJob.Internship')}}
									@elseif($simillerJob->job_type == "Temporary")
									{{__('backendJob.Temporary')}}
									@endif
									</li>
									<li><i class="icon-material-outline-account-balance-wallet"></i> ${{$simillerJob->min_salary}}-${{$simillerJob->max_salary}}</li>
									<li><i class="icon-material-outline-access-time"></i> {{$simillerJob->created_at->diffForHumans()}}</li>
								</ul>
							</div>
						</a>
						@endif

						@endif
					@endforeach	
					</div>
					<!-- Listings Container / End -->

				</div>
		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">
				@if( Route::has('login'))
		            @auth
			            @if( Auth::user()->user_type_id == 1 )
				            @php 
											$count = App\Models\Backend\JobApply::where('freelancer_id',Auth::user()->id)->where('job_id',$Job->id)->count();
										@endphp
										@if($count == 0)
											<a href="#small-dialog" class="apply-now-button popup-with-zoom-anim">{{__('job.Apply Now')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
										@else
											<div class="bidding-headline" style="margin-bottom: 20px;"><h3>{{__('job.You are Already Apply this job!')}}</h3></div>
										@endif
									@elseif( Auth::user()->user_type_id == 2)
				
								@endif
								
						@endif
						@if(Route::has('login'))
							@auth
							@if(Auth::user()->user_type_id !== 1)
							<a href="{{route('login')}}" class="apply-now-button">{{__('job.Apply Now')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
							@endif
							@else
							<a href="{{route('register.create')}}" class="apply-now-button ">{{__('job.Apply Now')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
							@endif
						@endif
					@endif

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<div class="job-overview">
						<div class="job-overview-headline">{{__('job.Job Summary')}}</div>
						<div class="job-overview-inner">
							<ul>
								<li>
									<i class="icon-material-outline-location-on"></i>
									<span>{{__('job.Location')}}</span>
									<h5>{{$Job->location}}</h5>
								</li>
								<li>
									<i class="icon-material-outline-business-center"></i>
									<span>{{__('job.Job Type')}}</span>
									@if($Job->job_type === "Full Time")
									<h5>{{__('backendJob.Full Time')}}</h5>
									@elseif($Job->job_type == "Freelance")
									<h5>{{__('backendJob.Freelance')}}</h5>
									@elseif($Job->job_type == "Part Time")
									<h5>{{__('backendJob.Part Time')}}</h5>
									@elseif($Job->job_type == "Internship")
									<h5>{{__('backendJob.Internship')}}</h5>
									@elseif($Job->job_type == "Temporary")
									<h5>{{__('backendJob.Temporary')}}</h5>
									@endif
								</li>
								<li>
									<i class="icon-material-outline-local-atm"></i>
									<span>{{__('job.Project Budget')}}</span>
									<h5>${{$Job->min_salary}} - ${{$Job->max_salary}}</h5>
								</li>
								<li>
									<i class="icon-material-outline-access-time"></i>
									<span>{{__('job.Date Posted')}}</span>
									<h5>{{$Job->created_at->diffForHumans()}}</h5>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<h3>{{__('task.Bookmark or Share')}}</h3>
					@if( Route::has('login'))
	                  @auth
	                    @if( Auth::user()->user_type_id == 1 )
	                    @php
                      	$count = App\Models\Backend\BookMarkJob::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('job_id',$Job->id)->count();
                      	@endphp
                      	@if($count == 0)
							<!-- Bookmark Button -->
							<form method="POST" action="{{route('bookmark.job',$Job->id)}}">
								@csrf
							<button class="bookmarkbButton margin-bottom-25" type="submit">
								<span class="bookmark-text">{{__('freelancer.Bookmark')}}</span>
							</button>
							</form>
						@else
						<!-- bookmark -->
						@php
                      	$bookmark = App\Models\Backend\BookMarkJob::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('job_id',$Job->id)->first();
                      	@endphp
							<form method="POST" action="{{route('bookmark.job.remove',$bookmark->id)}}">
								@csrf
							<button class="bookmarkbButton margin-bottom-25 backgroundColor" type="submit">
								<span class="bookmark-text">{{__('freelancer.Bookmarked')}}</span>
							</button>
							</form>

							@endif
						@endif
	                  @endif
	                @endif
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
								<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">{{__('job.Apply Now')}}</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>{{__('job.Attach File With CV')}}</h3>
				</div>
					
				<!-- Form -->
				<form method="POST" action="{{route('job.apply', $Job->id)}}" enctype="multipart/form-data">
					@csrf
					<div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="{{__('contact.Full Name')}}"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="emailaddress" id="emailaddress" placeholder="{{__('contact.Email')}}"/>
					</div>
					<span class="bidding-detail">{{__('job.Salary')}} <strong>{{__('job.Budget')}}</strong></span>
					<div class="bidding-value">$<span id="biddingVal"></span></div>
					<input class="bidding-slider" type="text" value="7" name="budget" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{$Job->min_salary}}" data-slider-max="{{$Job->max_salary}}" data-slider-value="35" data-slider-step="1" data-slider-tooltip="hide" />
					<div class="uploadButton margin-top-25">
						<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" name="file" multiple/>
						<label class="uploadButton-button ripple-effect" for="upload">{{__('job.Add Attachments')}}</label>
						<span class="uploadButton-file-name">{{__('job.Upload your CV/resume relevant file.')}} <br>{{__('job.Max. files size')}}: 50 MB.</span>
					</div>
					<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">{{__('job.Apply Now')}} <i class="icon-material-outline-arrow-right-alt"></i></button>

				</form>
				
				<!-- Button -->
				

			</div>
			

		</div>
	</div>
</div>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection