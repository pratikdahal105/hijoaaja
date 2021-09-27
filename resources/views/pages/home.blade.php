@extends('layouts.app')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg'); opacity: 0.9;">
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
            <h4>Gallery</h4>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/img/home-bg.jpg')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/img/about.jpg')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/img/home-bg.jpg')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @if($news_data[0] ?? null)
        @foreach($news_data as $news)
            <!-- Post preview-->
                <h4 class="mt-2">News</h4>
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
            <h4 class="mt-2">No News To Display</h4>
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
