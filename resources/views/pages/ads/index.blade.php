@include('includes.header')

@component('includes.breadcrumb')
    @slot("title")
        Anunturile mele
    @endslot
@endcomponent

<h3>Anunturile mele</h3>
@include('includes.alerts')

@if($ads->count() == 0)
    <p class="text-center">
        Nu ai adaugat niciun anunt!
    </p>
@endif
@foreach($ads as $ad)

<div class="personal-ads">
    <div class="image">
        @if(isset($ad->image))
        <a href="{{ url('/ads/'.$ad->id) }}"><img src="{{ Storage::url($ad->image) }}" /></a>
            @else
            <a href="{{ url('/ads/'.$ad->id) }}"><img src="{{ url('/assets/img/no-image.png') }}" /></a>
        @endif
    </div>
    <div class="ml-3 middle">
        <div class="title">
            <h4><a href="{{ url('/ads/'.$ad->id) }}">{{$ad->title}}</a></h4>
        </div>
        <div class="price-index">
            <span>
                {{$ad->price}}                     
                {{Str::upper($ad->currency)}}
            </span>
        </div>
        <div class="info">
            <div class="actions">
                <div>
                    <button class="edit"><a href="/ads/{{ $ad->id}}/edit">Editeaza</a></button>
                </div>
                <div>
                    <form method="post" action={{ url('/ads/' . $ad->id) }}>
                        @csrf
                        @method('DELETE')
                        <button class="delete">Sterge</button>
                    </form>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endforeach
<div class="pagination">
    {{ $ads->links("pagination::bootstrap-4") }}
</div>
@include('includes.footer')
