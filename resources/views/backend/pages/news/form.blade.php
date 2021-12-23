
<div class="form-row">
{{--    @if($news)--}}
{{--        <input type="hidden" name="id" value="{{$news->id}}">--}}
{{--    @endif--}}
    <div class="form-group col-md-12">
        <label for="">Category <span style="color: red">*</span></label>
        <select class="form-control " id="category_id" name="category_id" required>
            @if($news)
                <option value="{{$news->category_id}}" selected>Select Category To Change</option>
            @elseif(old('category_id'))
                <option value="{{old('category_id')}}" selected>Previous Selected</option>
            @else
                <option value="" selected disabled>Choose...</option>
            @endif

            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-12">
        <label for="">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="@if($news){{$news->author}}@else{{old('author')}}@endif">
    </div>
    <div class="form-group col-md-12">
        <label for="">Title <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="title" name="title" value="@if($news){{$news->title}}@else{{old('title')}}@endif" required>
    </div>
    <div class="form-group col-md-12">
        <label class="form-label" for="thumbnail">Thumbnail (Upload Again To Replace Existing)</label>
        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/png, image/gif, image/jpeg" />
    </div>
    <div class="form-group col-md-12">
        <label for="">Summary</label>
        <textarea type="text" class="form-control" id="summary" name="summary">@if($news){{$news->summary}}@else{{old('summary')}}@endif</textarea>
    </div>
    <div class="form-group col-md-12">
        <label for="">Body <span style="color: red">*</span></label>
        <textarea type="text" class="form-control summernote" id="body" name="body" required>@if($news){{$news->body}}@else{{old('body')}}@endif</textarea>
    </div>
    <div class="form-group col-md-12">
        <label for="">Publish Date <span style="color: red">*</span></label>
        <input type="date" class="form-control" id="publish_date" name="publish_date" value="@if($news){{$news->publish_date}}@else{{old('publish_date')}}@endif" required>
    </div>
    @if($news)
        <div class="form-group col-md-12">
            <select class="form-control " id="status" name="status" required>
                @if($news->status == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                @else
                    <option value="1">Active</option>
                    <option value="0" selected>Inactive</option>
                @endif
            </select>
        </div>
    @endif
</div>
@if($news)
    <button type="submit" class="btn btn-primary">Update</button>
@else
    <button type="submit" class="btn btn-primary">Create</button>
@endif
<a href="{{route('news.list')}}" class="btn btn-danger">Cancel</a>
