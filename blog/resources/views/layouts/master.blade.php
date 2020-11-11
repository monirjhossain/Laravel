<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" lang="en" content="ADD SITE DESCRIPTION">
        <meta name="author" content="ADD AUTHOR INFORMATION">
        <meta name="robots" content="index, follow">
 
        <!-- icons -->
        <link rel="apple-touch-icon" href="{{ asset('/assets/img/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="favicon.ico">
 
        <!-- Bootstrap Core CSS file -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> -->
 
        <!-- Override CSS file - add your own CSS rules -->
        <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}">
 
        <!-- Conditional comment containing JS files for IE6 - 8 -->
        <!--[if lt IE 9]>
            <script src="{{ asset('/assets/js/html5.js') }}"></script>
            <script src="{{ asset('/assets/js/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
 
@include('layouts.header')
 
        <!-- Page Content -->
        <div class="container-fluid">
             
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.sidebar')
            </div>
            <!-- /.row -->
@include('layouts.footer')
        </div>
        <!-- /.container-fluid -->
 
        <!-- JQuery scripts -->
        <script src="{{ asset('/assets/js/jquery-1.11.2.min.js') }}"></script>
        <!-- Bootstrap Core scripts -->
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
  </body>
</html>