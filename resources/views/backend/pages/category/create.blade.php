@extends('backend.master.master')

@section('content')

    <section id="about">
        <div class="container">
            <div class="about-info">
                <h2>Create Category</h2>
                @include('backend.layouts.message')
                <form action="{{route('category.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('backend.pages.category.from')
                </form>
            </div>
        </div>
    </section>


@stop
