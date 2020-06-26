@extends('layouts.app')

@section('title', 'Fablab')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/fablab/fablab.css') }}">
@endsection

@section('ajoutsScripts')
    <script src="{{asset('assets/js/fablab.js')}}" crossorigin="anonymous"></script>
@endsection

@section('content')

    <!-- Affichage du pannel des commandes en cours -->
    <div class="row justify-content-center m-1 mt-5">
        <h1 class="text-center">Commandes à réaliser</h1>
    </div>
    <div class="row justify-content-center no-gutters mb-2">
        <div class="no-gutters col-5">
            <hr class="separation-fine"/>
        </div>
    </div>
    <div class="row justify-content-center" id="commandesARealiser">

    </div>

    <div class="row justify-content-center m-5">
        <div class="col-11">
            <hr class="separation-epaisse"/>
        </div>
    </div>

    <div class="row justify-content-center m-1 mt-5">
        <h1 class="text-center">Commandes réalisées</h1>
    </div>

    <div class="row justify-content-center no-gutters mb-2">
        <div class="no-gutters col-5">
            <hr class="separation-fine"/>
        </div>
    </div>

    <div class="row justify-content-center pb-4" id="commandesRealisees">

    </div>

@endsection
