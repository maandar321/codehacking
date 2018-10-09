@extends('layouts.master')

@section('content')


    <h1>Categories</h1>
    <br>

    <div class="col-sm-6">
        <form method="post" action="{{url('admin/categories/'.$categories->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$categories->name}}" >
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">create category</button>
            </div>



        </form>

        <form method="post" action="{{url('admin/categories/'.$categories->id)}}">
            @csrf

            @method('DELETE')
            <div class="box-footer">
                <button type="submit" class="btn btn-danger">Delete category</button>
            </div>

        </form>

    </div>




@endsection