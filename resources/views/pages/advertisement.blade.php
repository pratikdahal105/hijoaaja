@php($ads = \App\Models\Advertisement::where('status', 1)->inRandomOrder()->limit(5)->get())
@foreach($ads as $ad)
    <a href="{{$ad->url}}" target="_blank">
        <img src="{{asset('uploads/ads/image/'.$ad->image)}}" class="img-fluid" alt="{{$ad->image}}" />
        @if($ad->caption)
            <p>{{$ad->caption}}</p><br>
        @endif
    </a>
@endforeach
