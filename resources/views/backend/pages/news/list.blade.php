@extends('backend.master.master')

@section('content')
    <div class="container-fluid">
        <span class="float-right m-2">
            <a href="{{route('news.create')}}" class="btn btn-success">Add +</a>
        </span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">News List</li>
        </ol>
        @include('backend.layouts.message')
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Category</th>
                    <th>Featured?</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news_data as $key=>$news)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$news->title}}</td>
                        <td>{{$news->views}}</td>
                        <td>{{$news->category->name}}</td>
                        @if($news->feature)
                            <td>Yes <a class="btn btn-outline-danger" href="{{route('remove.featured', $news->slug)}}">Remove</a>
                            </td>
                        @else
                            <td>No <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
                                    Feature
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add To Featured</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form" action="{{route('add.featured', $news->slug)}}" method="post" enctype="multipart/form-data" id="feature_form{{$news->slug}}">
                                                    @csrf
                                                    <div class="form-group col-md-12">
                                                        <label for="">Till</label>
                                                        <input type="date" class="form-control" id="till" name="till">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="submitForm(this.id)" id="{{$news->slug}}">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endif
                        <td>
                            <a href="{{route('news.edit', $news->slug)}}" class="btn btn-xs" title="Details & Edit"><i class="fa fa-pen"></i></a>
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
