@extends('backend.master.master')

@section('content')

    <div class="container-fluid">
        @include('backend.layouts.message')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-envelope"></i>
                        </div>
                        <div class="mr-5">Unread Emails: {{$emails}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('contact.list')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            @endif
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-newspaper"></i>
                        </div>
                        <div class="mr-5">Total News Views: {{$views}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('news.list')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Auth::user()->role_id==2 || \Illuminate\Support\Facades\Auth::user()->role_id==1)
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">Active Advertisement: {{$advertisement}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('ad.list')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-dark o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-user"></i>
                        </div>
                        <div class="mr-5">Total Admins: {{$user}}</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('user.list')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            @endif
@stop
