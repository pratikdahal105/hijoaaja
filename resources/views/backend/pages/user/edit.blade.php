@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Edit User</h2>
                @include('backend.layouts.message')
                <form action="{{route('user.edit', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.user.form')
                </form>
                @if($user)
                    <form class="mt-5" action="{{route('user.delete')}}" method="post" enctype="multipart/form-data" style="float: right;">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this User?')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@stop
