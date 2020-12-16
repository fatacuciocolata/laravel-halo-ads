@include('includes.header')

@component('includes.breadcrumb')
    @slot("title")
        {{$ad->title}}
    @endslot
@endcomponent

<div class="wrap">

    <div class="ad">
        <div class="ad-image">
            @if(isset($ad->image))
                <img src="{{ Storage::url($ad->image) }}" />
                @else
                <img src="{{ url('/assets/img/no-image.png') }}" />
            @endif
        </div>
        <div class="ad-description">
            <div class="description">
                <div>
                    <h3>{{ $ad->title }}</h3>
                </div>
                <span class="price">
                    {{$ad->price}} 
                    {{Str::upper($ad->currency)}}
                </span>
                <div class="text">
                    <h4>Descriere</h4>
                    <p>{!! nl2br(e($ad->description)) !!}</p>
                </div>
            </div>
            <div class="info">
                <div class="posted">
                    <span>publicat: {{$ad->created_at}}</span>
                </div>
            </div>
        </div>
       
    </div>
    <div class="right">
        <div class="user">
            <div class="saleman">Vanzator</div>
            <div class="content">

                <div class="left">
                    <div class="avatar">
                        <img src="https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-24.jpg" />
                    </div>
                </div>
                <div class="right">
                    <div style="width: max-content;">
                        <div class="username">
                            {{$user->username}}
                        </div>
                        <div class="since">
                            Pe site din {{Str::lower($user->created_at->translatedFormat('F Y'))}}
                        </div>
                        <div class="ads">
                            <a href="">Anunturile utilizatorului</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message">
                <button type="button" class="btn btn-dark">Trimite mesaj</button>
            </div>  
            <div class="call">
                <button type="button" class="btn btn-light"><a href="tel:{{$user->phone}}">Suna vanzatorul</a></button>
            </div>
        </div>
        {{-- <div class="user">
            <div class="saleman">Alte anunturi ale utilizatorului</div>
            <div class="content">
                <div class="left">
                    <div class="avatar">
                        <img src="https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-24.jpg" />
                    </div>
                </div>
                <div class="right">
                   Titlu anunt
                </div>
            </div>
            
        </div> --}}
        @if($user_ads->count() != 0)
        <div class="user-ads">
            <div class="title">Alte anunturi alte utilizatorului</div>
                @foreach($user_ads as $user_ad)
                <div class="ad-box">
                    <div class="image">
                        @if(isset($user_ad->image))
                            <a href="{{ url('/ads/'.$user_ad->id) }}"><img src="{{ Storage::url($user_ad->image) }}" /></a>
                            @else
                            <a href="{{ url('/ads/'.$user_ad->id) }}"><img src="{{ url('/assets/img/no-image.png') }}" /></a>
                        @endif
                    </div>

                    <div class="desc">
                        <div class="title"> <a href="{{ url('/ads/'.$user_ad->id) }}">{{Str::limit($user_ad->title, 35)}}</a></div>
                        <div class="price">{{$user_ad->price}} {{Str::upper($user_ad->currency)}}</div>
                    </div>
                </div>
                @endforeach
        </div>
        @endif
    </div>

  

</div>

@include('includes.footer')
