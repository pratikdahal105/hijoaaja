@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Mail Detail</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <h3>{{$contact->subject}}</h3>
            <p>{{$contact->message}}</p>
            <b class="float-right">From: {{$contact->email}}</b>
        </div><br>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#replyForm">Reply</button>
        <a href="{{route('contact.list')}}" class="btn btn-danger">Back</a>

        <!-- Modal -->
        <div class="modal fade" id="replyForm" tabindex="-1" role="dialog" aria-labelledby="replyForm" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('contact.send.mail')}}" method="post" enctype="multipart/form-data" id="messageForm">
                            @csrf
                            <input type="hidden" name="to" id="to" value="{{$contact->email}}">
                            <input type="hidden" name="subject" id="subject" value="{{$contact->subject}}">
                            <textarea name="reply" id="reply" rows="10" style="width: 100%"></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Send <i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function submitForm() {
                $("#messageForm").submit();
            }
            $(document).ready(function() {
                $('#reply').summernote();
            });
        </script>
@stop
