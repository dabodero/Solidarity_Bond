@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
           <h2> <p>Résumé de votre commande</p></h2>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Vos informations') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}"  autofocus>

                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="prenom" class="col-md-2 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                <div class="col-md-4">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="entreprise" class="col-md-2 col-form-label text-md-right">{{ __('Entreprise') }}</label>

                                <div class="col-md-4">
                                    <input id="entreprise" type="text" class="form-control @error('entreprise') is-invalid @enderror" name="entreprise" value="{{ old('entreprise') }}" autofocus>

                                    @error('entreprise')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="siret" class="col-md-2 col-form-label text-md-right">{{ __('SIRET') }}</label>

                                <div class="col-md-4">
                                    <input id="siret" type="text" class="form-control @error('siret') is-invalid @enderror" name="siret" value="{{ old('siret') }}" autofocus>

                                    @error('siret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Addresse mail') }}</label>

                                <div class="col-md-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telephone" class="col-md-2 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="telephone" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}">

                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Adresse 1') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse1" type="" class="form-control @error('Adresse 1') is-invalid @enderror" name="adresse1">

                                    @error('adresse1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adresse2" class="col-md-2 col-form-label text-md-right">{{ __('Adresse 2') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse2" type="password" class="form-control" name="adresse2">
                                </div>
                            </div>

                            <div class="form-group row mb-0 ml-3 float-right">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Commander') }}
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
