@extends('layouts.master-auth')

@section('content')
  <div class="page-single">
    <div class="container">
      <div class="row">
        <div class="col col-login mx-auto">
          <div class="text-center mb-6">
            <img src="./demo/brand/tabler.svg" class="h-6" alt="">
          </div>
          <form class="card" method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="card-body p-6">
              <div class="card-title">Connexion</div>
              <div class="form-group">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                  <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif 
              </div>
              <div class="form-group">
                <label class="form-label">
                  Mot de passe
                  <a href="#" class="float-right small">Mot de passe oublié ?</a>
                </label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="EMot de passe" value="{{ old('password') }}" required autofocus />
                @if ($errors->has('password'))
                  <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} />
                  <span class="custom-control-label">Souviens-toi de moi</span>
                </label>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">S'identifier</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection