@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center"><h3>{{ __('Conctact') }}</h3></div>

                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="Nom" class="col-md-2 col-form-label text-md-right">{{ __('Adresse mail :') }}</label>

                                <div class="col-md-6">
                                    <input id="Mail" type="email" class="form-control @error('Mail') is-invalid @enderror"
                                           name="Mail" value="{{ old('Mail') }}" autofocus>

                                    @error('Mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="Nom" class="col-md-2 col-form-label text-md-right">{{ __('Motif :') }}</label>

                                <div class="col-md-9">
                                    <input id="Motif" type="text" class="form-control @error('Motif') is-invalid @enderror"
                                           name="Motif" value="{{ old('Motif') }}" autofocus>

                                    @error('Motif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="Explication" class="col-md-2 col-form-label text-md-right">{{ __('Explication :') }}</label>
                                <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">

                                    </div>
                                    <textarea class="form-control"></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 ml-3">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-outline-primary">
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
