@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light mt-5">
        <div class="navbar-nav pt-5">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('news.all')}}">All News</a>
                    @foreach($cat as $news)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('news.filter', $news->name)}}">{{$news->name}}</a>
                    @endforeach
                </div>
            </li>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="font-weight-light text-center">
                <p>{{$category->name}}</p>
                <p>{{$category->caption}}</p>
            </div>
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
{{--                            <p class="post-meta">--}}
{{--                                Posted by--}}
{{--                                <a href="#{{$news->slug}}">{{$news->author}}</a>--}}
{{--                                on {{$news->publish_date}}--}}
{{--                            </p>--}}
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
