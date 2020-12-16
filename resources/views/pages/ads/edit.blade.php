@include('includes.header')
@component('includes.breadcrumb')
    @slot("title")
       Editare anunt
    @endslot
@endcomponent
<div class="create-ad">
    <h3>Editare anunt</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action={{ url('/ads/' . $ad->id) }} enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <input type="hidden" name="user_id" value={{Auth::user()->id}} />
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Titlu anunt</label>
            <div class="col-sm-9">
                <input name="title" type="text" class="form-control" id="titleid" placeholder="Titlu anunt" value="{{ $ad->title }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="descriptionid" class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-9">
                <textarea name="description" type="text" class="form-control" id="descriptionid" placeholder="Descriere">{{$ad->description}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="adprice" class="col-sm-3 col-form-label">Pret</label>
            <div class="col-sm-7">
                <input name="price" type="number" class="form-control" id="adprice" step="0.01" placeholder="Pret" value="{{ $ad->price }}">
            </div>
            <div class="col-sm-2">
                {{-- <label for="cars">Choose currency:</label> --}}
                <select class="form-control" name="currency" id="cars">
                    <option {{old('currency', $ad->currency)=="ron" ? 'selected':''}}  value="ron">RON</option>
                    <option {{old('currency', $ad->currency)=="euro" ? 'selected':''}}  value="euro">EURO</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-sm-5 row">
                <label for="city" class="col-sm-3 col-form-label">Oras</label>
                <div class="col-sm-9">
                    <input name="city" type="text" class="form-control" id="city" placeholder="Oras" value="{{ $ad->city }}">
                </div>
            </div>
            <div class="form-group col-sm-5 row">
                <label for="county" class="col-sm-3 col-form-label">Judet</label>
                <div class="col-sm-9">
                    <input name="county" type="text" class="form-control" id="county" placeholder="Judet" value="{{ $ad->county }}">
                </div>
            </div>
        </div>
        <div class="form-group row test">
            <label for="adimageid" class="col-sm-3 col-form-label">Incarca alta imagine</label>
            <div class="col-sm-2">
                @if(isset($ad->image))
                    <img style="width:100%" src="{{ Storage::url($ad->image) }}" />
                    <span>{{ pathinfo($ad->image, PATHINFO_BASENAME) }}</span>
                @else
                    Nicio imagine incarcata.
                @endif            
            </div>
            <div class="col-sm-7">
                <input name="image" type="file" id="adimageid">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Trimite</button>
            </div>
        </div>
    </form>
</div>

@include('includes.footer')
