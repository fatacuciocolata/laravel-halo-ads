@include('includes.header')

@component('includes.breadcrumb')
    @slot("title")
       Profilul meu
    @endslot
@endcomponent

<h3>Profilul meu</h3>

<div class="profile">

    <h4>Detalii personale</h4>
    <p>{{$user->name}}</p>
    <h4>Detalii cont</h4>
    <p>username: {{$user->username}}</p>
    <p>Oras: {{$user->city}}</p>
</div>
@include('includes.footer')
