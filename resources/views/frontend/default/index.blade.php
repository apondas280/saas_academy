<!DOCTYPE html>
<html>
<head>

	@include('frontend.default.include_top')

</head>
<body>
    
	@include('frontend.default.header')

	@yield('content')

    @include('frontend.default.footer')

	@include('frontend.default.include_bottom')
</body>
</html>