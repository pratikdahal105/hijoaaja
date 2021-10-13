@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Edit Gallery</h2>
                @include('backend.layouts.message')
                <form action="{{route('gallery.edit', $gallery)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.gallery.form')
                </form>
                @if($gallery)
                    <form class="mt-5" action="{{route('gallery.delete')}}" method="post" enctype="multipart/form-data" style="float: right;">
                        @csrf
                        <input type="hidden" value="{{$gallery->id}}" name="id">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Record?')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@stop
