@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Create User</h2>
                @include('backend.layouts.message')
                <form action="{{route('user.password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <label class="form-label" for="old_password">Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="name">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation"/>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


@stop
