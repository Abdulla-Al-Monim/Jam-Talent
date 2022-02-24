@extends('frontend.layout.template')
<!-- title section -->
@section('title')
Privacy And policy
@endsection

@section('body-content')
<!-- top section start  -->

<!-- <div class="top-sec">
  <div class="container p-5">
      <h1 class="text-center fs ">Privacy Policy</h1>
      <p class="text-center fs-5">Last Updated November 30, 2020</p>
  </div>
</div> -->

<!-- containt section start  -->
@if(session()->get('locale') == 'ar')
<div class="container my-5 px-5" lang="ar" dir="rtl">
@else
<div class="container my-5 px-5">
  @endif
    <h1 class="my-4">{{__('privacy.1. Introduction')}}</h1>Jamtalent
    {{__('privacy.and any other websites, features, applications, widgets or online services that are owned or controlled by jam talent and that post a link to this Privacy Policy (together with the Site, the')}}

    <p><b>JamTalent</b> {{__('privacy.is a part of the Jamsam group of companies. Jam Talent registration and login are part of the Jam Unity, one account for all of Jam and therefore all terms and conditions for Jamsam and Jam Unity applies to Jam talent. This Privacy Policy let you know our policies and procedures regarding the collection, use, and disclosure of information through')}} www.jamtalent.com (the <b>“{{__('privacy.Site')}})</b>,{{__('privacy.')}}  <b>“{{__('privacy.Service')}}</b>),{{__('privacy.as well as any information JamTalent collects offline in connection with the Service. It also describes the choices available to you regarding the use of, your access to, and how to update and correct your personal information.')}} </p>
    <p class="text-muted">{{__('privacy.For purposes of this policy the term “Freelancers” is broader in scope and includes both clients and Freelancers who are not Talent. The Personal Data we receive from Freelancers and Clients and how we handle it differs, so we explain our data practices for Freelancers and Clients in two distinct sections below. Navigate to the section that applies to you')}}</p>
        
    <h3>{{__('privacy.OUR MISSION:')}}</h3>

    <p>{{__('privacy.Our mission is to make an exceptional gigs, task and jobs marketplace for everyone at JamTalent platform, Employer can post a job or task to hire any professionals for their short term and long term projects')}}</p>
   @if(session()->get('locale') == 'ar') 
    <ul lang="ar" dir="rtl">
      @else
      <ul>
      @endif
       @if(session()->get('locale') == 'ar')
      <li lang="ar" dir="rtl">{{__('privacy.Can post jobs/tasks for short term project.')}}</li>
      @else
<li>{{__('privacy.Can post jobs/tasks for short term project.')}}</li>
      @endif
       @if(session()->get('locale') == 'ar')
      <li lang="ar" dir="rtl">{{__('privacy.Can hire individuals or team of freelancers')}}</li>
      @else
      <li>{{__('privacy.Can hire individuals or team of freelancers')}}</li>
      @endif
       @if(session()->get('locale') == 'ar')
      <li lang="ar" dir="rtl">{{__('privacy.Employer can build his own team by hiring individuals from different sectors.')}}</li>
      @else
      <li>{{__('privacy.Employer can build his own team by hiring individuals from different sectors.')}}</li>
      @endif
       @if(session()->get('locale') == 'ar')
      <li lang="ar" dir="rtl">{{__('privacy.Freelancer can bid for jobs/tasks individually or with his pre made team.')}}</li>
      @else
      <li>{{__('privacy.Freelancer can bid for jobs/tasks individually or with his pre made team.')}}</li>
      @endif
       @if(session()->get('locale') == 'ar')
      <li lang="ar" dir="rtl">{{__('privacy.Admin will work like a resolution center for both employer and freelancer.')}}</li>
      @else
       <li>{{__('privacy.Admin will work like a resolution center for both employer and freelancer.')}}</li>
       @endif
    </ul>

    <p>{{__('privacy.This Privacy Policy will help you better understand how we collect, use, and share your personal information. If we change our privacy practices, we may update this privacy policy. If any changes are significant, we will let you know (for example, through the Jamtalent admin or by email).')}}</p>
    
   
    <hr>

        <h1 class="my-4">{{__('privacy.2. Our values')}}</h1>
    <p>{{__('privacy.Trust is the foundation of the JamTalent platform and includes trusting us to do the right thing with your information. Three main values guide us as we develop our products and services. These values should help you better understand how we think about your information and privacy.')}}</p>
        
    <ul>
      <li>
        <h4>{{__('privacy.Your information belongs to you')}}</h4>
        <p>
          {{__('privacy.We carefully analyze what types of information we need to provide our services, and we try to limit the information we collect to only what we really need. Where possible, we delete or anonymize this information when we no longer need it. When building and improving our products, our engineers work closely with our privacy and security teams to build with privacy in mind. In all of this work our guiding principle is that your information belongs to you, and we aim to only use your information to your benefit.')}}
        </p>
      </li>
      <li>
        <h4>{{__('privacy.We protect your information from others')}}</h4>
        <p>
          {{__('privacy.If a third party requests your personal information, we will refuse to share it unless you give us permission or we are legally required. When we are legally required to share your personal information, we will tell you in advance, unless we are legally forbidden.')}}
        </p>
      </li>
      <li>
        <h4>{{__('privacy.We help Employers and Freelancers to meet their privacy obligations')}}</h4>
        <p>
          {{__('privacy.Many of the employer and freelancers using JamTalent do not have the benefit of a dedicated privacy team, and it is important to us to help them meet their privacy obligations. To do this, we try to build Jam talent platform ,so they can easily be used in a privacy-friendly way. We also provide detailed FAQs, documentation and whitepapers covering the most important privacy topics, and respond to privacy-related questions we receive.')}}
        </p>
      </li>
    </ul>

    <h2>{{__('privacy.Scope')}}</h2>
    <p>{{__('privacy.This Privacy Policy sets out how JamTalent collects, retains, and uses information, including personal data')}} (“<b>{{__('privacy.Personal Data')}}</b>”) {{__('privacy.about Freelancers, Clients, and other Site visitors and individuals, which include our vendors, partners, blog readers, and job applicants. The Privacy Policy also applies to users of JamTalent software offerings such as our image sharing and editing tool, affiliated sites, and data that JamTalent collects in-person, for instance, at business conferences and trade shows.')}}</p>
    
    <hr>

        <h1 class="my-4">{{__('privacy.3. Why we process your information')}}</h1>
        
        <p>{{__('privacy.We generally process your information when we need to do so to fulfill a contractual obligation (for example, to process your subscription payments to use the JamTalent platform), or where we or someone we work with needs to use your personal information for a reason related to their service. European law calls these reasons “legitimate interests.” These “legitimate interests” include:')}}</p>


    <ul>
        <li class="py4">{{__('privacy.Preventing risk and fraud')}}</li>
        <li class="py4">{{__('privacy.Answering questions or providing other types of support')}}</li>
        <li class="py4">{{__('privacy.Helping merchants find and use apps through our app store')}}</li>
        <li class="py4">{{__('privacy.Providing and improving our products and services')}}</li>
        <li class="py4">{{__('privacy.Providing reporting and analytics')}}</li>
        <li class="py4">{{__('privacy.Testing out features or additional services')}}</li>
        <li class="py4">{{__('privacy.Assisting with marketing, advertising, or other communications')}}</li>
        
      </ul> 

      <p>{{__('privacy.We only process personal information for these “legitimate interests” after considering the potential risks to your privacy—for example, by providing clear transparency into our privacy practices, offering you control over your personal information where appropriate, limiting the information we keep, limiting what we do with your information, who we send your information to, how long we keep your information, or the technical measures we use to protect your information.')}}</p>

    
        <hr>
        


        <h1 class="my-4">{{__('privacy.4. Your rights over your information')}}</h1>

        <i>{{__('privacy.According to applicable law, you may have certain choices and rights associated with your personal information.')}}</i>

        <h4>{{__('privacy.Communication Preferences.')}}</h4>
          <ul>
            <li>{{__('privacy.Registered JamTalent Users may update their choices regarding the types of communications you receive from us through your online account.')}}</li>
            <li>{{__('privacy.You may opt-out of receiving marketing emails from us by following the opt-out instructions provided in those emails. Please note that we reserve the right to send you certain communications relating to your account or use of the Service (for example, administrative and service announcements) via email and other means and these transactional account messages may be unaffected if you opt-out from receiving marketing communications.')}}</li>
            <li>{{__('privacy.You may opt-out of receiving text messages by replying “STOP” to any text message received.')}}</li>
            <li>{{__('privacy.Registered JamTalent Users who access the Service by using an JamTalent mobile application may, with permission, receive push notifications. Similarly, registered JamTalent Users who access the Service by using certain desktop browsers may, with permission, receive push notifications. Notification preferences can be modified in the settings menu for the mobile application or the applicable browser.')}}</li>
          </ul>
          <h4>{{__('privacy.Data Subject Rights.')}}</h4>
          <p>{{__('privacy.In accordance with applicable law, you may have the right to:')}}</p>
          <ul>
            <li><p><b>{{__('privacy.Access Personal Information')}} </b>{{__('privacy.about you, including:')}}
              <ol>
                <li style="list-style: lower-roman;">{{__('privacy.confirming whether we are processing your personal information.')}}</li>
                <li style="list-style: lower-roman;">{{__('privacy.obtaining access to or a copy of your personal information.')}}</li>
                </ol>
            </li>
          </p>

          <li>
            <p><b>{{__('privacy.Request Correction')}}</b>{{__('privacy.of your personal information where it is inaccurate, incomplete or outdated. In some cases, you can update your personal information within your JamTalent account by logging in and visiting settings/user settings.')}}</p>
          </li>
          <li>
            <p>
              <b>{{__('privacy.Request Deletion, Anonymization or Blocking of ')}}
              </b>{{__('privacy.of your personal information when processing is based on your consent or when processing is unnecessary, excessive or noncompliant. Note that if your information is deleted, then your account may become deactivated. If your account is deactivated or you ask to close your account, you will no longer be able to use the Service. If you would like to close your account in our system, you can do so through the JamTalent Service (once you have logged in, visit settings / user settings, and then click on the close my account link).')}}</p>
          </li>
          <li>
            <p>
              <b>{{__('privacy.Request Restriction of or Object to')}}
                
              </b>{{__('privacy.our processing of your personal information when processing is noncompliant.')}}
              
            </p>
          </li>
          <li>
            <p>
              <b>{{__('privacy.Withdraw your Consent')}}
                
              </b>{{__('privacy.to our processing of your personal information. If you refrain from providing personal information or withdraw your consent to processing, some features of our Service may not be available.')}}
              
            </p>
          </li>
          <li>
            <p>
              <b>{{__('privacy.Be informed')}} </b>
             {{__('privacy.about third parties with whom your personal information has been shared.')}} 
            </p>
          </li>
          <li>
            <p>
              <b>{{__('privacy.Request the review of')}} </b>
              {{__('privacy.taken exclusively based on automated processing if that could affect data subject rights.')}}
          </li>
          
          <p>{{__('privacy.We believe you should be able to access and control your personal information no matter where you live. Depending on how you use JamTalent Platform, you may have the right to request access to, correct, amend, delete, port to another service provider, restrict, or object to certain uses of your personal information (for example, direct marketing). We will not charge you more or provide you with a different level of service if you exercise any of these rights.')}}</p>

          <p>{{__('privacy.Please note that if you send us a request relating to your personal information, we have to make sure that it is you before we can respond. In order to do so, we may ask to see documentation verifying your identity, which we will discard after verification.')}}</p>

          <p>{{__('privacy.If you would like to designate an authorized agent to exercise your rights for you, please email us from the email address we have on file for you. If you email us from a different email address, we cannot determine if the request is coming from you and will not be able to accommodate your request. In your email, please include the name and email address of your authorized agent.')}}</p>
          <p>{{__('privacy.If you are not happy with our response to a request, you can contact us to resolve the issue. You also have the right to contact your local data protection or privacy authority at any time.')}}</p>
          <p>{{__('privacy.Finally, because there is no common understanding about what a “Do Not Track” signal is supposed to mean, we don’t respond to those signals in any particular way.')}}</p>
        <hr>
        </ul>


           <h1 class="my-4">{{__('privacy.5. Where we send your information')}}</h1>
           <p>{{__('privacy.We are a UAE company, but we work with and process data about individuals across the world. To operate our business, we may send your personal information outside of your state, province, or country, including to the United States. This data may be subject to the laws of the countries where we send it. When we send your information across borders, we take steps to protect your information, and we try to only send your information to countries that have strong data protection laws. If you would like more information about where your information might be sent, please contact us.')}}</p>

           
           <h4>{{__('privacy.Transfers outside of UAE and Turkey')}}</h4>
           <p>{{__('privacy.We are a Global company, but we work with and process data about individuals across the world. To operate our business, we may send your personal information outside of your state, province, or country, including to the United States. This data may be subject to the laws of the countries where we send it. When we send your information across borders, we take steps to protect your information, and we try to only send your information to countries that have strong data protection laws. If you would like more information about where your information might be sent, please contact us.')}}</p>

           <p>{{__('privacy.If you are in Europe or UK, when we send your personal information to Jam Talent it is protected under Canadian law, which the European Commission has found will adequately protect your information. If we then send this personal information outside of your state (for example, when we send this information to our Subprocessors), this information is protected by contractual commitments that are comparable to those provided in Standard Contractual Clauses.')}}</p>
          <p>{{__('privacy.Finally, while we do what we can to protect your information, we may at times be legally required to disclose your personal information (for example, if we receive a valid court order). For information about how we respond to such orders, please review our Guideline for legal Requests')}}
            
          </p>
          <hr>

           <h1 class="my-4">{{__('privacy.6. How we protect your information')}}</h1>
           <p>{{__('privacy.Our teams work tirelessly to protect your information, and to ensure the security and integrity of our platform. We also have independent auditors assess the security of our data storage and systems that process financial information. However, we all know that no method of transmission over the Internet, and method of electronic storage, can be 100% secure. This means we cannot guarantee the absolute security of your personal information. You can find more information about our security measures at')}} https://jamtalent.net/</p>
           
          
          <hr>

          <h1>{{__('privacy.7. How we use “cookies” and other tracking technologies')}}</h1>
          <p>{{__('privacy.We use cookies and similar tracking technologies on our website and when providing our services. For more information about how we use these technologies, including a list of other companies that place cookies on our sites, a list of cookies that we place when we power a merchant’s store, and an explanation of how you can opt out of certain types of cookies, please see our Cookie Policy.')}}
           
          </p>

          <hr>

          <h1>{{__('privacy.How you can reach us')}}</h1>
          <p>{{__('privacy.If you would like to ask about, make a request relating to, or complain about how we process your personal information, you can contact us by email at privacy [at] Jamtalent.com, or at one of the addresses below. If you would like to submit a legally binding request to demand someone else’s personal information (for example, if you have a subpoena or court order), please review our Guideline for legal Requests.')}}</p>



         <!--  <div class="py-5 my-5">
              <a href="#"><h2 class="text-primary text-center">Learn How Enterprises Benefit From <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
              </svg> </h2></a>
          </div> -->


          <hr>
<!-- containt section end  -->
</div>
<!-- footer start -->
@include('includes.footer')
<!-- footer end -->
@endsection