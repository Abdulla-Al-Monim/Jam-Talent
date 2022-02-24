@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Membership Plan
@endsection

@section('body-content')
<section class="margin-top-40 margin-bottom-40">
	<div class="container">
		<div class="row">
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
		</div>
	</div>
</section>
@include('includes.footer')
<!-- footer end -->
@endsection