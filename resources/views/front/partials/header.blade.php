<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset("vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css") }}">
    <!-- Main style -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset("vendor/fonts/inter/inter.css") }}">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset("vendor/adminlte/vendor/jquery/dist/jquery.min.js") }}"></script>
</head>
<body>