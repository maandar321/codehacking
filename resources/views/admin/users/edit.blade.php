@extends('layouts.master')

@section('content')

    <h1><b>Edit info</b> </h1>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <img src="/images/{{$user->photo_id}}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            <form method="post"  action="{{url('admin/users/'.$user->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Email1">Email address</label>
                        <input type="email" name="email" class="form-control"  value="{{$user->email}}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="Role_id">
                            <option value="{{$user->role->id}}">{{$user->role->name}}</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        {{--<input type="text" class="form-control"  placeholder="Enter role">--}}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="is_active">
                            <option >{{$user->is_active}}</option>
                            <option value="1">active</option>
                            <option value="0">not active</option>
                        </select>
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="password">Enter new password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="photo_id">File input</label>
                        <input type="file" name="photo_id">
                    </div>
                </div><!-- /.box-body -->
                <br>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary col-sm-6">Update User</button>
                </div>
            </form>
            <form method="post" action="{{url('admin/users/'.$user->id)}}">
                @method('DELETE')
                @csrf
                <div class="box-footer">
                    <button type="submit"  class="btn btn-danger col-sm-6">Delete User</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @include('include.form_error')
    </div>
@stop