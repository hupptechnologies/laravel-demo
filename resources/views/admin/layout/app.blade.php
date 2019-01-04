<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('public/admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ url('public/admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('public/admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="{{ url('public/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{ url('public/admin/plugins/dropzone/dropzone.css') }}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{ url('public/admin/plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ url('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ url('public/admin/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ url('public/admin/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Spinner Css -->
    <link href="{{ url('public/admin/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">

    <!-- Sweet Alert Css -->
    <link href="{{ url('public/admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ url('public/admin/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('public/admin/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('public/admin/css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-red">
    @include('admin.layout.nav')
    @include('admin.layout.sidebar')
    

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    @include('admin.layout.script')
</body>

</html>
