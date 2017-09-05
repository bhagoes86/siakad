<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield('judul')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {!! MaterializeCSS::include_full() !!}
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
</body>
</html>