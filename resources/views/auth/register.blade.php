@include('includes.header')

<div class="create-ad">
    <h3>Inregistreaza un cont nou</h3>

    @include('includes.alerts')

    <form method="post" action={{ route('register') }}>
        {{ csrf_field() }}
       {{-- @method('PUT') --}}
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Nume Prenume</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="name" placeholder="Numele tau">
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-3 col-form-label">Oras</label>
            <div class="col-sm-9">
                <input name="city" type="text" class="form-control" id="city" placeholder="Oras">
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-sm-3 col-form-label">Tara</label>
            <div class="col-sm-9">
                <input name="country" type="text" class="form-control" id="country" placeholder="Tara">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Nr. telefon</label>
            <div class="col-sm-9">
                <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefon">
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input name="email" type="text" class="form-control" id="email" placeholder="email@yahoo.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Parola</label>
            <div class="col-sm-9">
                <input name="password" class="form-control" type="password" id="password" placeholder="Parola">
            </div>
        </div>
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-3 col-form-label">Confirmare parola</label>
            <div class="col-sm-9">
                <input name="password_confirmation" class="form-control" type="password" id="password_confirmation" placeholder="Confirmare parola">
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
