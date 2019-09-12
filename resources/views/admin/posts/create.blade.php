@extends('adminlte::page')

@section('title', 'Post creation')

@section('content_header')
    <h1>Create post</h1>
@stop

@section('content')
@include('admin.partials.errors')

{{Form::open([
    'route'     => 'posts.store',
    'method'    => 'post',
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
                        {{ Form::label('title_en', 'Post title', array("class"=> "control-label")) }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                            {{ Form::text("title_en",
                                old("title_en") ? old("title_en") : (!empty($postEN) ? $postEN->title : null),
                                ["class" => "form-control", "placeholder" => "Post title"]
                            ) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('brief_en', 'Post brief', array("class"=> "control-label")) }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                            {{ Form::text("brief_en",
                                old("brief_en") ? old("brief_en") : (!empty($postEN) ? $postEN->brief : null),
                                ["class" => "form-control", "placeholder" => "Post brief"]
                            ) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('text_en', 'Full text', array("class"=> "control-label")) }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            {{Form::textarea("text_en", old("text_en") ? old("text_en") : (!empty($postEN) ? $postEN->company_info_full : null),
                                ["class" => "form-group", "id" => "editor1"])
                            }}
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab_2-2">
                    <div class="form-group">
                        {{ Form::label('title_ru', 'Заголовок поста', array("class"=> "control-label")) }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                            {{ Form::text("title_ru",
                                old("title_ru") ? old("title_ru") : (!empty($postRU) ? $postRU->title : null),
                                ["class" => "form-control", "placeholder" => "Заголовок"]
                            ) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('brief_ru', 'Короткий текст', array("class"=> "control-label")) }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-trademark"></i></span>
                            {{ Form::text("brief_ru",
                                old("brief_ru") ? old("brief_ru") : (!empty($postRU) ? $postRU->brief : null),
                                ["class" => "form-control", "placeholder" => "Короткий текст"]
                            ) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('text_ru', 'Статья', array("class"=> "control-label")) }}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            {{Form::textarea("text_ru", old("text_ru") ? old("text_ru") : (!empty($postRU) ? $postRU->company_info_full : null),
                                ["class" => "form-group", "id" => "editor2"])
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xs-12">
        <div class="box box-solid  box-danger" id="availability">
            <div class="box-header with-border">
                <h3 class="box-title">Post status</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="form-group">
                        {{ Form::label('status', 'Select availability of status', array("class"=> "control-label")) }}
                        <select name="status" id="status" class="form-control">
                            <option value="0" id="not-available">Post is NOT available on website</option>
                            <option value="1" id="available">Post is available available on website</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Post image</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('image', 'Image', array("class"=> "control-label")) }}
                    {{Form::file("image",
                        [
                            "class" => "form-control",
                        ])
                    }}
                </div>
            </div>
        </div>

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
    <script src="{{ asset('vendor/jquery.mask.min.js') }}"></script>
    <script> $('#phone').mask('+000 (00) 000-00-00');</script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>

    <script>
        $(document).ready( function () {
            $("select#status").change(function () {
                if ($(this).children("option:selected").val() === "1") {
                    $("#availability").removeClass("box-danger");
                    $("#availability").addClass("box-success");
                } else {
                    $("#availability").removeClass("box-success");
                    $("#availability").addClass("box-danger");
                }
            });
        });
    </script>
@stop