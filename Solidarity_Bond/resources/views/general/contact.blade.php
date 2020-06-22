@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/general/contact.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center"><h3>{{ __('Contact') }}</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{route('contact')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Adresse mail :') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="subject" class="col-md-2 col-form-label text-md-right">{{ __('Motif :') }}</label>

                                <div class="col-md-9">
                                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                                           name="subject" value="{{ old('subject') }}" autofocus>

                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="message" class="col-md-2 col-form-label text-md-right">{{ __('Explication :') }}</label>
                                <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">

                                    </div>
                                    <textarea id="message" name="message" class="form-control"></textarea>
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
