@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row pt-5">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <h3>{{$news->title}}</h3>
                {!! $news->body !!}
                <p class="post-meta font-weight-light">
                    Posted on {{$news->publish_date}}
                </p>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4">
                @include('pages.advertisement')
            </div>
        </div>
    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-617ec7bc319c2f40"></script>

@endsection
