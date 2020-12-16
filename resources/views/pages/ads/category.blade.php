@include('includes.header')
@include('includes.searchbar')

<h3>Toate anunturile din {{$category->title}}</h3>

@if($ads->count() == 0)
    <p class="text-center">
       Nu exista anunturi adaugate!
    </p>
@endif

@include('pages.ads.ad')
{{-- 
<div class="pagination">
    {{ $ads->links("pagination::bootstrap-4")}}
</div> --}}
@include('includes.footer')
