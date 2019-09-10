@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit information</h1>
@stop

@section('content')
    @include('admin.partials.errors')
{{Form::open([
    'route'	=> ['credentials.update', $credentialEN],
    'files'	=>	true,
    'method'	=>	'put'
])}}

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="false"><span class="flag flag-gbr"></span> English</a></li>
                    <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false"><span class="flag flag-rus"></span> Russian</a></li>

                    <li class="pull-left header"><i class="fa fa-th"></i> Overall information</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        <div class="form-group">
                            {{ Form::label('company_name_en', 'Company name', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                                {{ Form::text("company_name_en",
                                    old("company_name_en") ? old("company_name_en") : (!empty($credentialEN) ? $credentialEN->company_name : null),
                                    ["class" => "form-control", "placeholder" => "Company name"]
                                ) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('company_address_en', 'Address', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                {{ Form::text("company_address_en",
                                    old("company_address_en") ? old("company_address_en") : (!empty($credentialEN) ? $credentialEN->company_address : null),
                                    ["class" => "form-control", "placeholder" => "Address"]
                                ) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('company_info_brief_en', 'Brief information', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-ellipsis-h"></i></span>
                                {{ Form::text("company_info_brief_en",
                                    old("company_info_brief_en") ? old("company_info_brief_en") : (!empty($credentialEN) ? $credentialEN->company_info_brief : null),
                                    ["class" => "form-control", "placeholder" => "Brief information"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('company_info_full_en', 'Full information', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                {{Form::textarea("company_info_full_en", old("company_info_full_en") ? old("company_info_full_en") : (!empty($credentialEN) ? $credentialEN->company_info_full : null),
                                    ["class" => "form-group", "id" => "editor1"])
                                }}
                            </div>
                        </div>

                        <input type="hidden" name="anchor_ru" value="anchor_ru">
                        <input type="hidden" name="anchor_en" value="anchor_en">
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2-2">
                        <div class="form-group">
                            {{ Form::label('company_name_ru', 'Company name', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                                {{ Form::text("company_name_ru",
                                    old("company_name_ru") ? old("company_name_ru") : (!empty($credentialRU) ? $credentialRU->company_name : null),
                                    ["class" => "form-control", "placeholder" => "Company name"]
                                ) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('company_address_ru', 'Address', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                {{ Form::text("company_address_ru",
                                    old("company_address_ru") ? old("company_address_ru") : (!empty($credentialRU) ? $credentialRU->company_address : null),
                                    ["class" => "form-control", "placeholder" => "Address"]
                                ) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('company_info_brief_ru', 'Brief information', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-ellipsis-h"></i></span>
                                {{ Form::text("company_info_brief_ru",
                                    old("company_info_brief_ru") ? old("company_info_brief_ru") : (!empty($credentialRU) ? $credentialRU->company_info_brief : null),
                                    ["class" => "form-control", "placeholder" => "Brief information"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('company_info_full_ru', 'Full information', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                {{Form::textarea("company_info_full_ru", old("company_info_full_ru") ? old("company_info_full_ru") : (!empty($credentialRU) ? $credentialRU->company_info_full : null),
                                    ["class" => "form-group", "id" => "editor2"])
                                }}
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone number', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                {{ Form::text("phone",
                                    old("phone") ? old("phone") : (!empty($credentialEN) ? $credentialEN->phone : null),
                                    ["class" => "form-control", "placeholder" => "Phone number"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'E-mail', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                {{ Form::email("email",
                                    old("email") ? old("email") : (!empty($credentialEN) ? $credentialEN->email : null),
                                    ["class" => "form-control", "placeholder" => "E-mail"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('facebook', 'Facebook', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook-f"></i></span>
                                {{ Form::text("facebook",
                                    old("facebook") ? old("facebook") : (!empty($credentialEN) ? $credentialEN->facebook : null),
                                    ["class" => "form-control", "placeholder" => "Facebook"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('telegram', 'Telegram', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-telegram"></i></span>
                                {{ Form::text("telegram",
                                    old("telegram") ? old("telegram") : (!empty($credentialEN) ? $credentialEN->telegram : null),
                                    ["class" => "form-control", "placeholder" => "Telegram"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('instagram', 'Instagram', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                {{ Form::text("instagram",
                                    old("instagram") ? old("instagram") : (!empty($credentialEN) ? $credentialEN->instagram : null),
                                    ["class" => "form-control", "placeholder" => "Instagram"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('whatsapp', 'Whatsapp', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-whatsapp"></i></span>
                                {{ Form::text("whatsapp",
                                    old("whatsapp") ? old("whatsapp") : (!empty($credentialEN) ? $credentialEN->whatsapp : null),
                                    ["class" => "form-control", "placeholder" => "Whatsapp"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('logo', 'Logo', array("class"=> "control-label")) }}
                            {{Form::file("logo",
                                [
                                    "class" => "form-group",
                                ])
                            }}
                        </div>

                        @foreach($logotypes as $logo)
                        <div class="col-xs-6">
                            <img src="{{ url('/') }}/{{ $logo->url }}" alt="{{ $logo->url }}">

                            <input type="hidden" name="oldLogo" value="{{ $logo->url }}">
                        </div>
                        @endforeach

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flags/flag-css.min.css') }}">
@stop

@section('js')
    <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
    <script src="{{ asset('vendor/jquery.mask.min.js') }}"></script>
    <script> $('#phone').mask('+000 (00) 000-00-00');</script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>
@stop