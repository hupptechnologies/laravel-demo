<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <head>
        <title>@yield('title') | {{ config('app.name') }}</title>
	        <!-- Bootstrap core CSS -->
	    <link href="{{ asset('public/asset/public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="{{ asset('public/asset/public/css/modern-business.css') }}" rel="stylesheet">
	    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript">
            var base_url = '{{url('/')}}';
        </script>
        @include('layouts.script')
        
    </head>
    <body>
        @include('layouts.nav')
        <div style="margin-bottom: 120px;">
            @yield('content')
        </div>
        @include('layouts.footer')
    </body>
</html>