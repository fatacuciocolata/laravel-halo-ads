<div class="searchbar">
        <form action="{{ route('search') }}" method="GET" role="search">
            <div class="search">
                <input type="text" name="term" placeholder="Cauta dupa cuvinte cheie..." id="term">
                <button type="submit">Cauta</button>
            </div>
            </form>
        <div className="top-keywords">
        {{-- <span class="title">Top Keywords:</span>
        <span>
            Macbook Pro
        </span>
        <span>
            Macbook Air
        </span>
        <span>
            Macbook Retina
        </span> --}}
    </div>  
</div>