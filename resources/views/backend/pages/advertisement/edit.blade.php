@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Edit News</h2>
                @include('backend.layouts.message')
                <form action="{{route('ad.edit', $ad->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.advertisement.form')
                </form>
                @if($ad)
                    <form class="mt-5" action="{{route('ad.delete')}}" method="post" enctype="multipart/form-data" style="float: right;">
                        @csrf
                        <input type="hidden" value="{{$ad->id}}" name="id">
                    </form>
                @endif
            </div>
        </div>
    </section>


@stop
