@extends('adminlte::page')

@section('title', 'Information about company')

@section('content_header')
    <h1>Create new credential</h1>
@stop

@section('content')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#lang-ru').hide();
            $('#lang-en').hide();
        });

        $( "#ru" ).click(function() {
            $('#lang-ru').show();
            $('#lang-en').hide();
        });

        $( "#en" ).click(function() {
            $('#lang-en').show();
            $('#lang-ru').hide();
        });

    </script>
@stop