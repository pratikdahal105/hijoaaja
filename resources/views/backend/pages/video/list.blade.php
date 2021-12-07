@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <span class="float-right m-2">
            <a href="{{route('video.create')}}" class="btn btn-success">Add +</a>
        </span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Video List</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Url</th>
                    <th>Publish Date</th>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $key=>$video)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$video->url}}</td>
                    <td>{{$video->publish_date}}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
                    <td>
                        <a href="{{route('video.edit', $video)}}" class="btn btn-xs" title="Details & Edit"><i class="fa fa-pen"></i></a>
                    </td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@stop
