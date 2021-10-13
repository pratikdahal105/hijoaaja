@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Create Gallery</h2>
                @include('backend.layouts.message')
                <form action="{{route('gallery.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.gallery.form')
                </form>
            </div>
        </div>
    </section>


@stop
