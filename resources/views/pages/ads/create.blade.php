@include('includes.header')
@component('includes.breadcrumb')
    @slot("title")
       Adauga anunt
    @endslot
@endcomponent
<div class="create-ad">
    <h3>Adauga anunt</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action={{ url('/ads') }} enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value={{Auth::user()->id}} />
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Titlu anunt</label>
            <div class="col-sm-9">
                <input name="title" type="text" class="form-control" id="titleid" placeholder="Titlu anunt">
            </div>
        </div>
        <div class="form-group row">
            <label for="category" class="col-sm-3 col-form-label">Categorie</label>
            <div class="col-sm-9">
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="descriptionid" class="col-sm-3 col-form-label">Descriere</label>
            <div class="col-sm-9">
                <textarea name="description" type="text" class="form-control" id="descriptionid" placeholder="Descriere"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="adprice" class="col-sm-3 col-form-label">Pret</label>
            <div class="col-sm-7">
                <input name="price" type="number" class="form-control" id="adprice" step="0.01" placeholder="Pret">
            </div>
            <div class="col-sm-2">
                <select class="form-control" name="currency" id="cars">
                    <option value="ron">RON</option>
                    <option value="euro">EURO</option>
                </select>
            </div>
        </div>
        <div class="alert alert-info" role="alert">
            Am preluat locatia din contul tau. Poti modifica daca difera!
        </div>
        <div class="form-group row">
            <div class="form-group col-sm-5 row">
                <label for="city" class="col-sm-3 col-form-label">Oras</label>
                <div class="col-sm-9">
                    <input name="city" type="text" class="form-control" id="city" placeholder="Oras" value="{{ $user->city }}">
                </div>
            </div>
            <div class="form-group col-sm-5 row">
                <label for="county" class="col-sm-3 col-form-label">Judet</label>
                <div class="col-sm-9">
                    <input name="county" type="text" class="form-control" id="county" placeholder="Judet" value="{{ $user->county }}">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="adimageid" class="col-sm-3 col-form-label">Imagine</label>
            <div class="col-sm-9">
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
