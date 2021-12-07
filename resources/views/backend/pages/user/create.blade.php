@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Create User</h2>
                @include('backend.layouts.message')
                <form action="{{route('user.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.user.form')
                </form>
            </div>
        </div>
    </section>


@stop
