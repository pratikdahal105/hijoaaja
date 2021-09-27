@extends('layouts.app')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg'); opacity: 0.9;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading" style="opacity: 0;">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('news.all')}}">All News</a>
                    @foreach($news_data as $news)
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('news.filter', $news->category->name)}}">{{$news->category->name}}</a>
                    @endforeach
                </div>
            </li>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-xl-8">
            @if($news_data[0] ?? null)
            @foreach($news_data as $news)
                <!-- Post preview-->
                    <div class="post-preview" id="{{$news->slug}}">
                        <a href="{{route('news.detail',$news->slug)}}">
                            <h3 class="post-title">{{$news->title}}</h3>
                            <img width="100%" src="{{asset('uploads/news/thumbnail/'.$news->thumbnail)}}">
                            <h4 class="post-subtitle">{{$news->summary}}</h4>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#{{$news->slug}}">{{$news->author}}</a>
                            on {{$news->publish_date}}
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
            <div class="col-md-4 col-lg-4 col-xl-4">

            </div>
        </div>
    </div>
@endsection
