@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Edit Video</h2>
                @include('backend.layouts.message')
                <form action="{{route('video.edit', $video)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.video.form')
                </form>
                @if($video)
                    <form class="mt-5" action="{{route('video.delete')}}" method="post" enctype="multipart/form-data" style="float: right;">
                        @csrf
                        <input type="hidden" value="{{$video->id}}" name="id">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Record?')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </section>


@stop
