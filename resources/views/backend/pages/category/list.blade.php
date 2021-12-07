@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <span class="float-right m-2">
            <a href="{{route('category.create')}}" class="btn btn-success">Add +</a>
        </span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Category List</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Category</th>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
                    <th>Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$category->name}}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
                        <td>
                            <a href="{{route('category.edit', $category)}}" title="Detail & Edit" class="btn btn-xs"><i class="fa fa-pen"></i></a>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@stop
