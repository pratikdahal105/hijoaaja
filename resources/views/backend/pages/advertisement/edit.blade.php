@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Edit Advertisement</h2>
                @include('backend.layouts.message')
                <form action="{{route('ad.edit', $ad->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.advertisement.form')
                </form>
                @if($ad)
                    <form class="mt-5" action="{{route('ad.delete')}}" method="post" enctype="multipart/form-data" style="float: right;">
                        @csrf
                        <input type="hidden" value="{{$ad->id}}" name="id">
                        <button class="btn btn-danger"><i class="fa fa-trash" onclick="javascript:return confirm('Are you sure you want to delete this News?')"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </section>


@stop
