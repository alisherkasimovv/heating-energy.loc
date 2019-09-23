@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Blog products</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List of created products</h3>
        </div>

        <div class="box-body">
            <a href="{{route('products.create')}}" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i> Create new product
            </a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (count($productsEN) > 0)
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 15px">#</th>
                        <th>Name</th>
                        <th class="table-widths__widest">Images</th>
                        <th class="table-widths">Edit</th>
                        <th class="table-widths">Delete</th>
                    </tr>

                    @foreach($productsEN as $single)
                        <tr>
                            <td>{{ $single->id }}</td>
                            <td>{{ $single->name }}</td>
                            <td>
                                @foreach($single->images as $img)
                                    <img class="table-images__small" src="{{ url('/') }}/{{$img->url}}" alt="{{ $single->name }}">
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('products.edit', $single->id)}}" class="btn btn-block btn-primary btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </td>
                            <td>
                                {{Form::open(['route'=>['register', $single->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-block btn-danger btn-sm">
                                    <i class="fa fa-remove"></i>
                                </button>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $productsEN->render() }}
            @else

                <h4>There are any products on DB. Press button above to create new</h4>

            @endif
        </div>

        <!-- /.box-body -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@stop