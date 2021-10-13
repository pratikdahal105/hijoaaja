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

            </div>
        </div>
    </div>
@endsection
