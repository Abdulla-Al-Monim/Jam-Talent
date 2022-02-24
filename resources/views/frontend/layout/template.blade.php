<!doctype html>
@if(session()->get('locale') == 'ar')	
<html lang="ar" dir="rtl">
@else
<html lang="en">
@endif
<head>

@include('includes.header')

@include('includes.css')

</head>
@if(session()->get('locale') == 'ar')
<body lang="ar" dir="rtl" style="text-align: revert;">
@else
<body>
@endif
<!-- Wrapper -->
@if(session()->get('locale') == 'ar')
<div id="wrapper"lang="ar" dir="rtl">
@else
<div id="wrapper">
@endif

@include('includes.topbar')


@yield('body-content')

</div>
<!-- Wrapper / End -->
@include('includes.script')



</body>
</html>