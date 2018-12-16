@extends('layouts.login')

@section('content')
<!-- BEGIN LOGIN FORM -->
<form class="login-form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <h3 class="form-title font-green">Connexion</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Entrez un nom d'utilisateur et un mot de passe. </span>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input id="email" class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus /> 
        @if ($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif 
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
        <input id="password" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mot de passe" name="password" required="" />
        @if ($errors->has('password'))
            <span class="help-block">{{ $errors->first('password') }}</span>
        @endif 
    </div>
    <div class="form-actions">
        <button type="submit" class="btn green uppercase">S'identifier</button>
        <label class="rememberme check mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Souviens-toi de moi
            <span></span>
        </label>
        <a href="javascript:;" id="forget-password" class="forget-password">Mot de passe oublié ?</a>
    </div>
    <div class="create-account">
        <p>
            <a href="javascript:;" id="register-btn" class="uppercase">Créer un compte</a>
        </p>
    </div>
</form>
<!-- END LOGIN FORM -->
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form"  method="POST" action="{{ url('/password/reset') }}">
    <h3 class="font-green">Mot de passe oublié ?</h3>
    <p> Entrez votre adresse e-mail ci-dessous pour réinitialiser votre mot de passe. </p>
    <div class="form-group">
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn green btn-outline">Retour</button>
        <button type="submit" class="btn btn-success uppercase pull-right">Valider</button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
@endsection
