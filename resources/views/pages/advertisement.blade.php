<?php
    $ads = \App\Models\Advertisement::where('status', 1)->get();
?>
@foreach($ads as $ad)
{{--    <a href="{{$ad->url}}">--}}
        <img src="{{asset('uploads/ads/image/'.$ad->image)}}" class="d-block w-100" alt="...">
        @if($ad->caption)
            <p>{{$ad->caption}}</p><br>
        @endif
{{--    </a>--}}
@endforeach
