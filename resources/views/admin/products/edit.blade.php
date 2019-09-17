@extends('adminlte::page')

@section('title', 'Post creation')

@section('content_header')
    <h1>Create post</h1>
@stop

@section('content')
    @include('admin.partials.errors')

    {{Form::open([
        'route'     => ['products.update', $product],
        'method'    => 'put',
        'files'     => true
    ])}}

    <input type="hidden" name="anchor_ru" value="anchor_ru">
    <input type="hidden" name="anchor_en" value="anchor_en">

    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="false"><span class="flag flag-gbr"></span> English</a></li>
                    <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false"><span class="flag flag-rus"></span> Russian</a></li>

                    <li class="pull-left header"><i class="fa fa-th"></i> Overall information</li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        <div class="form-group">
                            {{ Form::label('name_en', 'Product name', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                                {{ Form::text("name_en",
                                    old("name_en") ? old("name_en") : (!empty($productEN) ? $productEN->name : null),
                                    ["class" => "form-control", "placeholder" => "Post title"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description_en', 'Full text', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                {{Form::textarea("description_en", old("description_en") ? old("description_en") : (!empty($productEN) ? $productEN->description : null),
                                    ["class" => "form-group", "id" => "editor1"])
                                }}
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_2-2">
                        <div class="form-group">
                            {{ Form::label('name_ru', 'Заголовок поста', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                                {{ Form::text("name_ru",
                                    old("name_ru") ? old("name_ru") : (!empty($productRU) ? $productRU->name : null),
                                    ["class" => "form-control", "placeholder" => "Заголовок"]
                                ) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description_ru', 'Описание продукта', array("class"=> "control-label")) }}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                {{Form::textarea("description_ru", old("description_ru") ? old("description_ru") : (!empty($productRU) ? $productRU->description : null),
                                    ["class" => "form-group", "id" => "editor2"])
                                }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Related</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('suggestPosts', 'Select related posts', array("class"=> "control-label")) }}
                        <select multiple="multiple" name="suggestPosts[]" id="suggestPosts" class="form-control">
                            @foreach($suggestPosts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{ Form::label('suggestProducts', 'Select related Products', array("class"=> "control-label")) }}
                        <select multiple="multiple" name="suggestProducts[]" id="suggestProducts" class="form-control">
                            @foreach($suggestProducts as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload images</h3>
                </div>
                <div class="box-body">
                    <div class="input-group control-group increment-images" >
                        <input type="file" name="images[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-success" id="btn-add-image" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                    </div>
                    <div class="clone-img hide">
                        <div class="control-group input-group" id="image-field" style="margin-top:10px">
                            <input type="file" name="images[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" id="btn-remove-image" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <span class="help-block">You can upload multiple images by pressing Add button</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row increment-chars">
        <div class="col-md-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Characteristics of product</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="flag flag-gbr"></span></span>
                                    <input type="text" name="keys_en[]" class="form-control">
                                </div>
                            </td>
                            <td><input type="text" name="values_en[]" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="flag flag-rus"></span></span>
                                    <input type="text" name="keys_ru[]" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="values_ru[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" id="btn-add-char" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row clone-char hide">
        <div class="col-md-12 col-xs-12" id="char-field">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Characteristics of product</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="flag flag-gbr"></span></span>
                                    <input type="text" name="keys_en[]" class="form-control">
                                </div>
                            </td>
                            <td><input type="text" name="values_en[]" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="flag flag-rus"></span></span>
                                    <input type="text" name="keys_ru[]" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="values_ru[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" id="btn-remove-chars" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="box box-primary">--}}
    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">Related</h3>--}}
    {{--</div>--}}
    {{--<div class="box-body">--}}
    {{--<div class="form-group">--}}
    {{--{{ Form::label('suggestPosts', 'Select related posts', array("class"=> "control-label")) }}--}}
    {{--<select multiple="multiple" name="suggestPosts[]" id="suggestPosts" class="form-control">--}}
    {{--@foreach($suggestPosts as $post)--}}
    {{--<option value="{{ $post->id }}">{{ $post->title }}</option>--}}
    {{--@endforeach--}}
    {{--</select>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--{{ Form::label('suggestProducts', 'Select related Products', array("class"=> "control-label")) }}--}}
    {{--<select multiple="multiple" name="suggestProducts[]" id="suggestProducts" class="form-control">--}}
    {{--@foreach($suggestProducts as $product)--}}
    {{--<option value="{{ $product->id }}">{{ $product->name }}</option>--}}
    {{--@endforeach--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <div class="row">
        <div class="col-md-8 col-xs-12">

        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {{ Form::close() }}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flags/flag-css.min.css') }}">
@stop

@section('js')
    <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>
    <script>
        $(document).ready(function() {

            $("#btn-add-image").click(function(){
                var html = $(".clone-img").html();
                $(".increment-images").after(html);
            });

            $("#btn-add-char").click(function(){
                var html = $(".clone-char").html();
                $(".increment-chars").after(html);
            });

            $("body").on("click","#btn-remove-image",function(){
                $(this).parents("#image-field").remove();
            });

            $("body").on("click","#btn-remove-chars",function(){
                $(this).parents("#char-field").remove();
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            function createJSON() {
                jsonObj = [];
                $("input[class=email]").each(function() {

                    var id = $(this).attr("title");
                    var email = $(this).val();

                    item = {};
                    item ["title"] = id;
                    item ["email"] = email;

                    jsonObj.push(item);
                });

                console.log(jsonObj);
            }
        });

    </script>
@stop