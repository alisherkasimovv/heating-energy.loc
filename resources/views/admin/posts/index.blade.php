@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Blog posts</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List of created posts</h3>
        </div>

        <div class="box-body">
            <a href="{{route('posts.create')}}" class="btn btn-success">
                <i class="fa fa-plus" aria-hidden="true"></i> Create new post
            </a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (count($postsEN) > 0)
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 15px">#</th>
                        <th>Заголовок новости</th>
                        <th>Изображение</th>
                        <th style="width: 120px;">Публичность</th>
                        <th style="width: 80px;">Изменить</th>
                        <th style="width: 80px;">Удалить</th>
                    </tr>

                    @foreach($postsEN as $single)
                        <tr>
                            <td>{{ $single->id }}</td>
                            <td>{{ $single->title }}</td>
                            <td>
                                @foreach($single->images as $img)
                                    <img min-width="100px" src="{{ url('/') }}{{$img->url}}" alt="{{ $single->title }}">
                                @endforeach
                            </td>
                            <td>
                                @if($single->status == 1)
                                    <span class="badge bg-green">Activated</span>
                                @else
                                    <span class="badge bg-red">Deactivated</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('posts.edit', $single->id)}}" class="btn btn-block btn-primary btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </td>
                            <td>
                                {{Form::open(['route'=>['posts.destroy', $single->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                    <i class="fa fa-remove"></i>
                                </button>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else

                <h4>There are any posts on DB. Press button above to create new</h4>

            @endif
        </div>

        <!-- /.box-body -->
        <div class="box-footer clearfix">
            {{--{{ $posts->links() }}--}}
        </div>
    </div>
@stop