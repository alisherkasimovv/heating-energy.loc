@extends('adminlte::page')

@section('title', 'Категория')

@section('content_header')
    <h1>Создание категории</h1>
@stop

@include('admin.partials.errors')
@section('content')
    {{Form::open([
		'route'	=> 'categories.store'
	])}}

    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="false"><span class="flag flag-gbr"></span> English</a></li>
                    <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false"><span class="flag flag-rus"></span> Russian</a></li>

                    <li class="pull-left header"><i class="fa fa-th"></i> Enter information</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        <div class="form-group">
                            {{ Form::label('name_en', 'Name', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                                {{ Form::text("name_en",
                                    old("name_en") ? old("name_en") : (!empty($categoryEN) ? $categoryEN->name : null),
                                    ["class" => "form-control", "placeholder" => "Name"]
                                ) }}
                            </div>
                        </div>
                        
                        <input type="hidden" name="anchor_ru" value="anchor_ru">
                        <input type="hidden" name="anchor_en" value="anchor_en">
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2-2">
                        <div class="form-group">
                            {{ Form::label('name_ru', 'Название', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                                {{ Form::text("name_ru",
                                    old("name_ru") ? old("name_ru") : (!empty($categoryRU) ? $categoryRU->name : null),
                                    ["class" => "form-control", "placeholder" => "Название"]
                                ) }}
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Parent category</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <select class="form-control" name="parent_id">
                            <option value="0">-- No parent category --</option>
                            @include('admin.partials.listing', ['categories' => $categories])
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{Form::close()}}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/flags/flag-css.min.css') }}">
@stop