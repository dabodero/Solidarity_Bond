@extends('layouts.app')

@section('title', 'Authentification')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/login.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Connexion') }}</div>

                    <div class="card-body">
                        <!-- Création du formulaire -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <!-- Champs mail -->
                                <label for="Mail"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="Mail" type="email"
                                           class="form-control @error('Mail') is-invalid @enderror" name="Mail"
                                           value="{{ old('Mail') }}" required autocomplete="email" autofocus>

                                    @error('Mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Champs mot de passe -->
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-4 "></div>
                                <div class="col-md-4 bleu-cesi">
                                    <!-- Redirection vers la page mot de passe oublié -->
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-1 ">
                                    <!-- Redirection vers la page d'enregistrement -->
                                    <a class="btn btn-link" href="{{route('register')}}">
                                        {{ __('Inscription') }}
                                    </a>

                                </div>
                            </div>

                            <div class="form-group row mb-0 ml-3">
                                <div class="col-md-6 offset-md-5">
                                    <!-- Bouton d'envoi de formulaire -->
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Connexion') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
