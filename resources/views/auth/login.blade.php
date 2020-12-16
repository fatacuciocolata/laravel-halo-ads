@include('includes.header')

<div class="create-ad">
    <h3>Login User</h3>
    
    @include('includes.alerts')

    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input name="password" class="form-control" type="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
</div>

@include('includes.footer')
