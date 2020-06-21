@extends('layouts.app')

@section('title', 'À propos de nous')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/general/a-propos.css') }}">
@endsection

@section('content')


    <div class="container text-center mt-5">
        <h1 ><p class="titre border-bottom p-3" >Qui sommes nous ?</p></h1>
        <h5><p class="mt-5">Étudiants en deuxième année d'école d'ingénieurs au CESI de Lyon, nous avons décidé d'apporter notre pierre à l'édifice pour la lutte contre la propagation du COVID-19. Pour cela nous vous proposons une vitre modulable permettant de vous protéger en respectant les mesures de distantiation physique. Basé sur le campus d'écully notre école nous permet de vous offrir gracieusement nos produits.</p></h5>
    </div>


@endsection

