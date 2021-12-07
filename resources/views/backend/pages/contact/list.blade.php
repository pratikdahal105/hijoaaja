@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Contact Mails List</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $key=>$contact)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>
                            <a href="{{route('contact.detail', $contact)}}" class="btn btn-xs" title="View"><i class="fa fa-eye"></i>
                                @if($contact->status == 1)
                                    <span><i class="fa fa-envelope-open" style="color: #0be30b"></i></span>
                                    <a href="{{route('contact.not.seen', $contact)}}" class="btn btn-outline-danger float-right">Mark Unread</a>
                                @else
                                    <span><i class="fa fa-envelope" style="color:red;"></i></span>
    {{--                                <span>Not Seen</span>--}}
                                @endif
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@stop
