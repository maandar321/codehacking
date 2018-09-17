@extends('layouts.master')

@section('content')

    <h1><b>User sign_up</b> </h1>
    <br>
    <br>

    <form method="post" action="{{url('admin/users')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <br>
            <div class="form-group">
                <label for="Email1">Email address</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter Email">
            </div>
            <br>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="Role_id">
                    <option value="">Select Role</option>
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
                    <option value="">select status</option>
                    <option value="1">active</option>
                    <option value="0">not active</option>


                </select>
                <br>
                <br>
        </div>

            <div class="form-group">
                <label for="password">Enter password</label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter your password">
            </div>
            <br>



            <div class="form-group">
                <label for="photo_id">File input</label>
                <input type="file" name="photo_id">
                {{--<p class="help-block">Example block-level help text here.</p>--}}
            </div>
            {{--<div class="checkbox">--}}
                {{--<label>--}}
                    {{--<input type="checkbox"> Check me out--}}
                {{--</label>--}}
            {{--</div>--}}
        </div><!-- /.box-body -->
        <br>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">create user</button>
        </div>
    </form>

    @include('include.form_error')

    @stop