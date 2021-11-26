
<div class="form-row">
{{--    @if($news)--}}
{{--        <input type="hidden" name="id" value="{{$news->id}}">--}}
{{--    @endif--}}
    <div class="form-group col-md-12">
        <label for="">URL <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="url" name="url" value="@if($ad){{$ad->url}}@else{{old('url')}}@endif" required>
    </div>
    <div class="form-group col-md-12">
        <label class="form-label" for="thumbnail">@if($ad)Image (Upload Again To Replace Existing)@else Image <span style="color: red">*</span> @endif</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/png, image/gif, image/jpeg">
    </div>
    <div class="form-group col-md-12">
        <label for="">Caption (optional)</label>
        <input type="text" class="form-control" id="caption" name="caption" value="@if($ad){{$ad->caption}}@else{{old('caption')}}@endif">
    </div>
    <div class="form-group col-md-12">
        <label for="">Status</label>
        <select class="form-control" id="status" name="status">
            @if($ad)
                @if($ad->status == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                @else
                    <option value="1">Active</option>
                    <option value="0" selected>Inactive</option>
                @endif
            @elseif(old('caption'))
                @if(old('caption') == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                @else
                    <option value="1">Active</option>
                    <option value="0" selected>Inactive</option>
                @endif
            @else
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            @endif
        </select>
    </div>
</div>
@if($ad)
    <button type="submit" class="btn btn-primary">Update</button>
@else
    <button type="submit" class="btn btn-primary">Create</button>
@endif
<a href="{{route('ad.list')}}" class="btn btn-danger">Cancel</a>
