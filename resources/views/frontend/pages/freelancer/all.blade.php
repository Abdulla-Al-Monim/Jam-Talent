@extends('frontend.layout.template')
@section('title')
All Freelancer
@endsection
@section('body-content')
<div class="margin-top-90"></div>
<div class="container">
	<div class="row">
		
		<div class="col-xl-12 col-lg-12 content-left-offset">

			<!-- <h3 class="page-title">Search Results</h3> -->

		<!-- 	<div class="notify-box margin-top-15">
				<div class="switch-container">
					<label class="switch"><input type="checkbox"><span class="switch-button"></span><span class="switch-text">Turn on email alerts for this search</span></label>
				</div>

				<div class="sort-by">
					<span>Sort by:</span>
					<div class="btn-group bootstrap-select hide-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Relevance"><span class="filter-option pull-left">Relevance</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Relevance</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Newest</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Oldest</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Random</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker hide-tick" tabindex="-98">
						<option>Relevance</option>
						<option>Newest</option>
						<option>Oldest</option>
						<option>Random</option>
					</select></div>
				</div>
			</div>
			 -->
			<!-- Freelancers List Container -->
			<div class="freelancers-container freelancers-grid-layout margin-top-35">
				
				<!--Freelancer -->
				<!--Freelancer -->
					@foreach($freelancers as $highRatedFreelancer)
					<div class="freelancer">
            @php
          $orderComplete = App\Models\Backend\Order::where('freelancer_id', $highRatedFreelancer->id)->where('status',3)->count();
                      
          @endphp
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
									<a href="{{route('single.freelancer.profile',$highRatedFreelancer->id)}}">
                    @if($highRatedFreelancer->image == null)
                            <img src="{{ asset('images/default.jpeg')}}" alt="">
                          @else
                  <img src="{{ asset('images/freelancer/' . $highRatedFreelancer->image)}}" alt="">
              @endif
                  </a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="{{route('single.freelancer.profile',$highRatedFreelancer->id)}}"> {{$highRatedFreelancer->full_name}} 
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
                    <img class="flag" src="{{asset('images/flags/Emirates-flag.svg')}}" alt="" title="United Arab Emirates" data-tippy-placement="top">
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
                     Emirates
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
									<li>{{__('home.Order Complete')}} <strong>{{$orderComplete}}</strong></li>
								</ul>
							</div>
							<a href="{{route('single.freelancer.profile',$highRatedFreelancer->id)}}" class="button button-sliding-icon ripple-effect">{{__('home.View Profile')}} <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->
					@endforeach
				<!-- Freelancer / End -->
	
			</div>
			<!-- Freelancers Container / End -->


			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<!-- <div class="pagination-container margin-top-40 margin-bottom-60">
						<nav class="pagination">
							<ul>
								<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
								<li><a href="#" class="ripple-effect">1</a></li>
								<li><a href="#" class="current-page ripple-effect">2</a></li>
								<li><a href="#" class="ripple-effect">3</a></li>
								<li><a href="#" class="ripple-effect">4</a></li>
								<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div> -->
				</div>
			</div>
			<!-- Pagination / End -->

		</div>
	</div>
</div>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection