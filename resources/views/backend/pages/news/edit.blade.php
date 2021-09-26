@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Edit News</h2>
                @include('backend.layouts.message')
                <form action="{{route('news.edit', $news->slug)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.news.form')
                </form>
                @if($news)
                    <form class="mt-5" action="{{route('news.delete')}}" method="post" enctype="multipart/form-data" style="float: right;">
                        @csrf
                        <input type="hidden" value="{{$news->slug}}" name="slug">
                    </form>
                @endif
            </div>
        </div>
    </section>


@stop
