
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="@if($video){{$video->title}}@else{{old('title')}}@endif">
    </div>
    <div class="form-group col-md-12">
        <label for="">Caption</label>
        <input type="text" class="form-control" id="caption" name="caption" value="@if($video){{$video->caption}}@else{{old('caption')}}@endif">
    </div>
    <div class="form-group col-md-12">
        <label for="">Url <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="url" name="url" value="@if($video){{$video->url}}@else{{old('url')}}@endif" required>
    </div>
    <div class="form-group col-md-12">
        <label for="">Publish Date <span style="color: red">*</span></label>
        <input type="date" class="form-control" id="publish_date" name="publish_date" value="@if($video){{$video->publish_date}}@else{{old('publish_date')}}@endif" required>
    </div>
</div>
@if($video)
    <button type="submit" class="btn btn-primary">Update</button>
@else
    <button type="submit" class="btn btn-primary">Create</button>
@endif
<a href="{{route('video.list')}}" class="btn btn-danger">Cancel</a>
