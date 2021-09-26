
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="">Name <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="name" name="name" value="@if($category){{$category->name}}@else{{old('name')}}@endif" required>
    </div>
    <div class="form-group col-md-12">
        <label for="">Caption</label>
        <textarea type="text" class="form-control" id="caption" name="caption" required>@if($category){{$category->caption}}@else{{old('caption')}}@endif</textarea>
    </div>
</div>
@if($category)
    <button type="submit" class="btn btn-primary">Update</button>
@else
    <button type="submit" class="btn btn-primary">Create</button>
@endif
<a href="{{route('category.list')}}" class="btn btn-danger">Cancel</a>
