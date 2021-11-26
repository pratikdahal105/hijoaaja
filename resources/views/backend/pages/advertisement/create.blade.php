@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Create News</h2>
                @include('backend.layouts.message')
                <form action="{{route('ad.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.advertisement.form')
                </form>
            </div>
        </div>
    </section>


@stop
