@extends('layouts.app')

@section('title', 'Inscription')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/register.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Enregistrement') }}</div>

                    <div class="card-body">
                        <!-- Création du formulaire -->
                        <form method="POST" action="{{ route('register') }}">

                            @csrf

                            <div class="form-group row">
                                <!-- Champs Nom -->
                                <label for="Nom" class="col-md-2 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-4">
                                    <input id="Nom" type="text" class="form-control @error('Nom') is-invalid @enderror"
                                           name="Nom" value="{{ old('Nom') }}" placeholder="Nom" autofocus>

                                    @error('Nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- Champs Prenom -->
                                <label for="Prenom"
                                       class="col-md-2 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                <div class="col-md-4">
                                    <input id="Prenom" type="text"
                                           class="form-control @error('Prenom') is-invalid @enderror" name="Prenom"
                                           value="{{ old('Prenom') }}" placeholder="Prénom">

                                    @error('Prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- Champs Entreprise -->
                                <label for="Entreprise"
                                       class="col-md-2 col-form-label text-md-right">{{ __('Entreprise') }}</label>

                                <div class="col-md-4">
                                    <input id="Entreprise" type="text"
                                           class="form-control @error('Entreprise') is-invalid @enderror"
                                           name="Entreprise" value="{{ old('Entreprise') }}" placeholder="Entreprise"
                                           autofocus>

                                    @error('Entreprise')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- Champs Telephone -->
                                <label for="Telephone"
                                       class="col-md-2 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                                <div class="col-md-4">
                                    <input id="Telephone" type="tel"
                                           class="form-control @error('Telephone') is-invalid @enderror"
                                           name="Telephone" value="{{ old('Telephone') }}" placeholder="0607080904">

                                    @error('Telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Champs mail -->
                                <label for="Mail"
                                       class="col-md-2 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                                <div class="col-md-4">
                                    <input id="Mail" type="email"
                                           class="form-control @error('Mail') is-invalid @enderror" name="Mail"
                                           value="{{ old('Mail') }}" placeholder="exemple@exemple.exemple">

                                    @error('Mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Champs mot de passe -->
                                <label for="MotDePasse"
                                       class="col-md-2 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="MotDePasse" type="password"
                                           class="form-control @error('MotDePasse') is-invalid @enderror"
                                           name="MotDePasse">

                                    @error('MotDePasse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Champs de confirmation du mot de passe -->
                                <label for="MotDePasse_confirmation"
                                       class="col-md-2 col-form-label text-md-right">{{ __('Confirmation') }}</label>

                                <div class="col-md-6">
                                    <input id="MotDePasse_confirmation" type="password" class="form-control"
                                           name="MotDePasse_confirmation">

                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- Checkbox pour les cgb -->
                                <div class="col-12 ml-1">
                                    <div class="form-check offset-md-2">
                                        <input class="form-check-input @error('cgv') is-invalid @enderror"
                                               type="checkbox" id="cgv" name="cgv">
                                        <label class="form-check-label" for="cgv">
                                            J'accepte les <a href="{{route('cgv')}}">conditions générales de vente</a>.
                                        </label>
                                        @error('cgv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 ml-3">

                                <!-- Bouton d'envoi de formulaire -->
                                <div class="col-md-6 offset-md-4 offset-lg-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Envoyer') }}
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
