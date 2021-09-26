@extends('layouts.app')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading" style="opacity: 0;">
                    <h1>a</h1>
                    <span class="subheading">a</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-lg-7 col-xl-7">
        @if($news_data[0] ?? null)
        @foreach($news_data as $news)
            <!-- Post preview-->
                <div class="post-preview" id="{{$news->news->slug}}">
                    <a href="{{route('news.detail',$news->news->slug)}}">
                        <h3 class="post-title">{{$news->news->title}}</h3>
                        <img width="100%" src="{{asset('uploads/news/thumbnail/'.$news->news->thumbnail)}}">
                        <h4 class="post-subtitle">{{$news->news->summary}}</h4>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#{{$news->news->slug}}">{{$news->news->author}}</a>
                        on {{$news->news->publish_date}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
        @endforeach
            <!-- Pager-->
        @else
            <h4>No News To Display</h4>
        @endif
        </div>
        <div class="col-md-5 col-lg-5 col-xl-5">
            @foreach($videos as $video)
                <div class="post-preview">
                    <h4 class="post-title">{{$video->title}}</h4>
                    <div style="position: relative;overflow: hidden;width: 100%;padding-top: 56.25%; ">
                        <iframe class="responsive-iframe" style="
                        position: absolute;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        right: 0;
                        width: 100%;
                        height: 100%;"
                                src="https://www.youtube.com/embed/{{$video->url}}" allowfullscreen>
                        </iframe>
                    </div>
                    <span class="post-subtitle">{{$video->caption}}</span>
                    <span class="post-meta">
                        (Posted on {{$video->publish_date}})
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
