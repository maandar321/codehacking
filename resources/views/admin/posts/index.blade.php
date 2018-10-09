@extends('layouts.master')


@section('content')
    <table class="table">
        <thead>
        <tr>

            <th>id</th>
            <th>photo</th>
            <th>user</th>
            <th>category</th>
            <th>title</th>
            <th>body</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts))

            @foreach($posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    <th><img style="max-height: 100px" src="{{asset('images/'.$post->photo_id)}}" alt=""></th>
                    <th><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></th>
                    <th>{{$post->category ? $post->category->name : 'uncategorize'}}</th>
                    <th>{{$post->title }}</th>
                    <th>{{$post->body}}</th>
                    <th>{{$post->created_at->diffForHumans()}}</th>
                    <th>{{$post->updated_at->diffForHumans()}}</th>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop