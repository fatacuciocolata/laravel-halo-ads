@include('includes.header')
@component('includes.breadcrumb')
    @slot("title")
       Cautare
    @endslot
@endcomponent
@include('includes.searchbar')

<h3>Ai cautat: "{{$term}}"</h3>

@if($ads->count() == 0)
    <p class="text-center">
       Nu exista anunturi!
    </p>
@endif

@include('pages.ads.ad')

<div class="pagination">
    {{ $ads->links("pagination::bootstrap-4") }}
</div>
@include('includes.footer')
