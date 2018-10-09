@extends('layouts.master')

@section('content')


    <h1>Categories</h1>
    <br>

    <div class="col-sm-6">
        <form method="post" action="{{url('admin/categories')}}">
            @csrf
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">create category</button>
            </div>



        </form>

    </div>


    <div class="col-sm-6">
        @if('categories')

        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Created_at</th>
            </tr>
            </thead>

            <tbody>

            @foreach($categories as $category)

                <tr>

                    <th>{{$category->id}}</th>
                    <th><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></th>
                    <th>{{$category->created_at ? $category->created_at->diffForHumans():'no date'}}</th>
                </tr>

            @endforeach

            </tbody>





        </table>

        @endif

    </div>

    @endsection