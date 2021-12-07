@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <span class="float-right m-2">
            <a href="{{route('gallery.create')}}" class="btn btn-success">Add +</a>
        </span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Gallery List</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Image</th>
                    <th>Caption</th>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($gallerys as $key=>$gallery)
{{--                    @php(dd(public_path('uploads\news\gallery/'.$gallery->image)))--}}
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img width="100" height="100" src="{{asset('uploads/news/gallery/'.$gallery->image)}}"></td>
                        <td>{{$gallery->caption}}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
                        <td>
                            <a href="{{route('gallery.edit', $gallery)}}" class="btn btn-xs" title="Details & Edit"><i class="fa fa-pen"></i></a>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@stop
