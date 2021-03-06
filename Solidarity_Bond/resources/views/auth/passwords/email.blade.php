@extends('layouts.app')

@section('title', 'Redéfinition du mot de passe')

@section('meta-description',"Page de demande de redéfinition du mot de passe")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Redéfinition du mot de passe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif
                    <!-- Création du formulaire -->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="Mail"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="Mail" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="Mail"
                                           value="{{ old('Mail') }}" required autocomplete="Mail" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Bouton d'envoi de formulaire -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
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
