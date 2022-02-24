<!doctype html>
@if(session()->get('locale') == 'ar')	
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif
<head>

@include('includes.header')
@include('includes.css')

</head>
@if(session()->get('locale') == 'ar')
<body class="gray" lang="ar" dir="rtl" style="text-align: revert;">
@else
<body class="gray">
@endif

<div id="wrapper">

@include('includes.topbar')

<!-- Header Container / End -->
<!-- Dashboard Container -->
	<div class="dashboard-container">

	@include('includes.sidebar')

	@yield('body-content')
	</div>
	<!-- Dashboard Container / End -->
</div>
<!-- Wrapper / End -->


<!-- Apply for a job popup
================================================== -->

<!-- Apply for a job popup / End -->

@include('includes.script')


</body>
</html>