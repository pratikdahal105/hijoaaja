
<div class="form-row">
    <div class="form-group col-md-12">
        <label class="form-label" for="thumbnail">Image <span style="color: red">*</span> (Upload Again To Replace Existing)</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg" />
    </div>
    <div class="form-group col-md-12">
        <label for="">Caption</label>
        <input type="text" class="form-control" id="caption" name="caption" value="@if($gallery){{$gallery->caption}}@else{{old('caption')}}@endif">
    </div>
</div>
@if($gallery)
    <button type="submit" class="btn btn-primary">Update</button>
@else
    <button type="submit" class="btn btn-primary">Create</button>
@endif
<a href="{{route('video.list')}}" class="btn btn-danger">Cancel</a>
