@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <span class="float-right m-2">
            <a href="{{route('ad.create')}}" class="btn btn-success">Add +</a>
        </span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Advertisement List</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>URL</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $key=>$ad)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$ad->url}}</td>
                        <td><img src="{{asset('uploads/ads/image/'.$ad->image)}}" width="200"  height="200" alt="{{$ad->image}}"></td>
                        <td>
                            @if($ad->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>
                            <a href="{{route('ad.edit', $ad->id)}}" class="btn btn-xs" title="Details & Edit"><i class="fa fa-pen"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function submitForm(id) {
                var form = document.getElementById("feature_form"+id);
                form.submit();
            }
        </script>

@stop
