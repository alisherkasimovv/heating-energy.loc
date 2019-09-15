@extends('adminlte::page')

@section('title', 'Information about company')

@section('content_header')
    <h1>Overall information about company</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Company information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>This page shows overall information about company. These data will be shown on different parts of the website</p>
                <p>Choose language: <a href="#" id="en">English</a> | <a href="#" id="ru">Русский</a></p>
                <div id="lang-en">
                    <span class="badge bg-green" id="lang-help-ru"></span>
                    <dl class="dl-horizontal">
                        <dt>Comapny name</dt>
                        <dd><h2>{{ $credentialEN->company_name }}</h2><br></dd>
                        <dt>Address</dt>
                        <dd>{{ $credentialEN->company_address }}</dd><br>
                        <dt>Phone</dt>
                        <dd>{{ $credentialEN->phone }}</dd><br>
                        <dt>Email</dt>
                        <dd>{{ $credentialEN->email }}</dd><br>
                        <dt>Brief information</dt>
                        <dd>{{ $credentialEN->company_info_brief }}</dd><br>
                        <dt>Full information</dt>
                        <dd>{{ $credentialEN->company_info_full }}</dd><br>
                        <dt>Logo</dt>
                        <dd>
                            @foreach($logotypes as $logo)
                                <div class="col-xs-6">
                                    <img src="{{ url('/') }}/{{ $logo->url }}" alt="{{ $logo->url }}">
                                </div>
                            @endforeach
                        </dd>
                    </dl><br><br>

                    <h4 class="text-center">Ссылки на социальные сети</h4>

                    <div class="col-md-6 col-md-offset-3">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="text-center"><a href="http://{{ $credentialEN->facebook }}" target="_blank"><i style="font-size: 25px;" class="fa fa-facebook-official"></i></a></th>
                                <th class="text-center"><a href="http://{{ $credentialEN->telegram }}" target="_blank"><i style="font-size: 25px;" class="fa fa-telegram"></i></a></th>
                                <th class="text-center"><a href="http://{{ $credentialEN->instagram }}" target="_blank"><i style="font-size: 25px;" class="fa fa-instagram"></i></a></th>
                                <th class="text-center"><a href="http://{{ $credentialEN->whatsapp }}" target="_blank"><i style="font-size: 25px;" class="fa fa-whatsapp"></i></a></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="lang-ru">
                    <span class="badge bg-green" id="lang-help-en"></span>
                    <dl class="dl-horizontal">
                        <dt>Название компании</dt>
                        <dd><h2>{{ $credentialRU->company_name }}</h2><br></dd>
                        <dt>Адрес</dt>
                        <dd>{{ $credentialRU->company_address }}</dd><br>
                        <dt>Телефон</dt>
                        <dd>{{ $credentialEN->phone }}</dd><br>
                        <dt>Телефон</dt>
                        <dd>{{ $credentialEN->email }}</dd><br>
                        <dt>Основная информация</dt>
                        <dd>{{ $credentialRU->company_info_brief }}</dd><br>
                        <dt>Полная информация</dt>
                        <dd>{{ $credentialRU->company_info_full }}</dd><br>
                        <dt>Логотип компании</dt>
                        <dd>
                            @foreach($logotypes as $logo)
                                <div class="col-xs-6">
                                    <img src="{{ url('/') }}/{{ $logo->url }}" alt="{{ $logo->url }}">
                                </div>
                            @endforeach
                        </dd>
                    </dl><br><br>

                    <h4 class="text-center">Ссылки на социальные сети</h4>

                    <div class="col-md-6 col-md-offset-3">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="text-center"><a href="http://{{ $credentialEN->facebook }}" target="_blank"><i style="font-size: 25px;" class="fa fa-facebook-official"></i></a></th>
                                <th class="text-center"><a href="http://{{ $credentialEN->telegram }}" target="_blank"><i style="font-size: 25px;" class="fa fa-telegram"></i></a></th>
                                <th class="text-center"><a href="http://{{ $credentialEN->instagram }}" target="_blank"><i style="font-size: 25px;" class="fa fa-instagram"></i></a></th>
                                <th class="text-center"><a href="http://{{ $credentialEN->whatsapp }}" target="_blank"><i style="font-size: 25px;" class="fa fa-whatsapp"></i></a></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{route('credentials.edit', $credentialEN)}}" class="btn btn-block btn-primary btn-sm">
                    Edit Credentials
                </a>
            </div>
        </div>
    </div>
    @stop

@section('js')
<script src="{{ url('/') }}/vendor/adminlte/vendor/jquery/dist/jquery.min.js"></script>

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