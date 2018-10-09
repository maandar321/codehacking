@extends('layouts.master')

@section('content')



    <h1><b>create post</b> </h1>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <img src="/images/{{$posts->photo_id}}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            <form method="post" action="{{url('admin/posts/'.$posts->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="Name">title</label>
                        <input type="text" name="title" value="{{$posts->title}}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="category_id">category</label>
                        <select class="form-control" name="category_id">
                            <option value=" {{$posts->category->id}}">{{$posts->category->name}}</option>
                            @foreach($categories as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                        {{--@php--}}
                        {{--$lang=["ali"=>'php',"maan"=>'java'];--}}
                        {{--@endphp--}}
                        {{--<option value="1">{{$lang['ali']}}</option>--}}
                        {{--<option value="2">{{$lang['maan']}}</option>--}}

                    </div>
                    <br>
                    <div class="form-group">
                        <label for="photo_id">Photo:</label>
                        <input type="file" name="photo_id">
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    </div>
                    <div class="form-group">
                        <label for="body">Description:</label>
                        <textarea type="text" name="body"  class="form-control" rows="10">{{$posts->body}}</textarea>
                    </div>
                    <br>
                </div><!-- /.box-body -->
                <br>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary col-sm-6">Update Posts</button>
                </div>
            </form>

            <form method="post" action="{{url('admin/posts/'.$posts->id)}}">

                @method('DELETE')
                @csrf

                <div class="box-footer">
                    <button type="submit"  class="btn btn-danger col-sm-6">Delete Post</button>
                </div>
            </form>

        </div>
    </div>

    <div class="row">

        @include('include.form_error')

    </div>
@stop