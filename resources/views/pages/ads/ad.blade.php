<div class="boxes">

@foreach($ads as $ad)
    <div class="box">
        <div class="panel">
            <div class="panel-cont">
            <div class="image">
                @if(isset($ad->image))
                    <a href="{{ url('/ads/'.$ad->id) }}"><img src="{{ Storage::url($ad->image) }}" /></a>
                    @else
                    <a href="{{ url('/ads/'.$ad->id) }}"><img src="{{ url('/assets/img/no-image.png') }}" /></a>
                @endif
            </div>
            <div class="content">
                <span style="background: #34D399; margin-top: 10px;" class="badge badge-success"><i class="far fa-clock"></i> {{\Carbon\Carbon::parse($ad->updated_at)->diffForHumans()}}</span>
                {{-- <a href="{{ url('/category/'.$ad->category_id) }}"><span style="background:#60A5FA" class="badge badge-primary">{{$ad->category_title}}</span></a> --}}

                <div class="title">
                    <h4><a href="{{ url('/ads/'.$ad->id) }}">{{$ad->title}}</a></h4>
                </div>
            
                {{-- <div class="description">
                    {{$ad->short_description}}        
                </div> --}}
                <div class="price">
                    {{$ad->price}}                     
                    {{Str::upper($ad->currency)}}
                </div>
                <div class="location"><i class="fas fa-map-marker-alt"></i> {{$ad->city}}</div>
            </div>
        </div>
        </div>
    </div>
@endforeach

</div>