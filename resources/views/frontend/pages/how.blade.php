@extends('frontend.layout.template')
<!-- title section -->
@section('title')
{{__('topbar.how')}}
@endsection


@section('body-content')
<style type="text/css">
  </style>
<!-- how page  -->
<section class="ia-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-light" style="padding-top:200px;">{{__('how.Join the worlds work marketplace')}}</h1>
      </div>
    </div>

  </div>
</section>
        <div class="container">
            <section class="my-5">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="mb-3">{{__('how.Let’s get to 
work')}}</h2>
                    <p class="mb-3">{{__('how.Build relationships and create your own Virtual Talent Bench™ for quick project turnarounds or big transformations.')}}</p>
                    <h2 class="mb-3">{{__('how.Post a job and hire a pro')}}</h2>
                    <p class="mb-3">{{__('how.Connect with talent that gets you with Talent Marketplace
            Post your job on the world’s work marketplace and wait for the proposals to flood in from talented people around the world. Our advanced algorithms help you shortlist candidates who are the best fit. And you can check profiles, portfolios, and reviews before you give someone the green light.')}}

                    </p>

                    <p class="mb-3">

        </p>
                    
                  </div>
                  <div class="col-md-6">
                    <img src="{{asset('image/blog-04.jpg')}}" alt="">
                  </div>
                </div>
              </div>
            </section>

        

        <div class="container">

  <div class="row align-items-center justify-content-between my-4 ">
    <div class="col-md-4">
      <img src="{{asset('images/Postyourjob-task.svg')}}" class="img-fluid" alt="">
    </div>
    <div class="col-md-6">
      <div class="how-info text-right">
        
        
        <h2 class="mb-3">{{__('how.You’re safe with us')}}</h2>
        <p class="mb-3">{{__('how.You get what you pay for. 
And we can prove it.
On hourly contracts,
 we count keystrokes and 
take random screenshots 
of your freelancer’s screen
 so you can see they’re putting
 in the time.
On fixed price contracts,
 you agree on milestones 
and only pay up when those
 milestones are hit.')}}

        <h2 class="mb-3">{{__('how.All in one place')}}</h2>
        <p class="mb-3">{{__('how.Once you sign in you’ll get 
your own online space to 
manage your project.
Use it to securely send and 
receive files, give real-time 
feedback and make 
payments. And if you’re 
out and about a lot, 
you’ll want to download
 the app too.')}}

        </p>
        <a href="{{route('all.freelancer')}}" class="btn btn-primary mr-auto ml-auto">{{__('how.Find Talent')}}</a>
      </div>
    </div>
  </div>

  <div class="row align-items-center justify-content-between my-4 ">
    <div class="col-md-6">
      <div class="how-info">
        <h2 class="mb-3">{{__('how.Filter bidding from top 
talents')}}
        </h2>
        <p class="mb-3">{{__('how.Bid for task: In this system,
 the freelancers can bid for 
the task posted by the 
employer by giving the 
overall quotation.')}}

        </p>
        <p class="mb-3">{{__('how.employer by giving the overall quotation. Apply for job/ task: in this system, the freelancers can apply for the job posted by the employer by giving the overall quotation')}}

        </p>
      </div>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/Filterbiddingfromtoptalents.svg')}}" class="img-fluid" alt="">
    </div>
  </div>

  <div class="row align-items-center justify-content-between my-4 ">
    <div class="col-md-4">
      <img src="{{asset('images/Paymentsecuredbyadmin.svg')}}" class="img-fluid" alt="">
    </div>
    <div class="col-md-6">
      <div class="how-info text-right">
        <h2 class="mb-3">{{__('how.Payment secured by admin')}}
        </h2>
        <p class="mb-3">{{__('how.In the system, the admin will maintain the payment security on behalf of the buyer and seller and take his commission from both sides. Only after the order is successfully done then the admin will transfer the employers money or payment to the freelancers.')}}

        </p>
      </div>
    </div>
  </div>

  <div class="row align-items-center justify-content-between my-4 ">
    <div class="col-md-6">
      <div class="how-info">
        <h2 class="mb-3">{{__('how.Accept your offer')}}
        </h2>
        <p class="mb-3">{{__('how.Freelancers can accept or decline the custom offer from the employer who submitted a custom offer alongside the employer can also accept the bidders and let the bidder start their job/s or tasks')}}

        </p>
      </div>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/Acceptyouroffer.png')}}" class="img-fluid" alt="">
    </div>
  </div>

  <div class="row align-items-center justify-content-between my-4 ">
    <div class="col-md-4">
      <img src="{{asset('images/Buildyourteam.svg')}}" class="img-fluid" alt="">
    </div>
    <div class="col-md-6">
      <div class="how-info text-right">
        <h2 class="mb-3">{{__('how.Build your team')}}
        </h2>
        <p class="mb-3">{{__('how.Just post your job for a team or individual and make your job done fast and easy but very excellent.For big projects freelancers and employers, can both build their own powerful and expert team to complete their tasks.')}}

        </p>
      </div>
    </div>
  </div>

  <div class="row align-items-center justify-content-between my-4 ">
    <div class="col-md-6">
      <div class="how-info">
        <h2 class="mb-3">{{__('how.Complete the order')}}</h2>
        <p class="mb-3">{{__('how.After submitting the task is the employer accepts the order then the order is marked as complete. And give their valuable review to each other Be our returning client')}}

        </p>
        <p class="mb-3">{{__('how.We are ensuring the best quality freelancer in our platform to enforce our employer came back again and again')}}

        </p>
      </div>
    </div>
    <div class="col-md-4">
      <img src="{{asset('images/Completetheorder.svg')}}" class="img-fluid" alt="">
    </div>
  </div>

</div>
    </div>
<!-- how page end -->
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection

