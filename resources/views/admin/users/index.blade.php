@extends('layouts.master')


@section('content')
<div>
    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{Session('deleted_user')}}</p>

    @endif
</div>


<h1>All users</h1>

    <table class="table">
        <thead>
        <tr>

            <th>id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created_at</th>
            <th>Updated_at</th>

        </tr>
        </thead>
        <tbody>
        @if(count($users))

            @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th><img style="height: 50px" src="{{asset('images/'.$user->photo_id)}}" alt=""></th>
                <th><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></th>
                <th>{{$user->email}}</th>
                <th>{{$user->role->name}}</th>
                <th>{{$user->is_active==1 ? 'active' : 'not-active', null }}</th>
                <th>{{$user->created_at->diffForHumans()}}</th>
                <th>{{$user->updated_at->diffForHumans()}}</th>



            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

@endsection
