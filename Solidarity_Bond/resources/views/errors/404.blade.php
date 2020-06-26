@extends('layouts.app')

@section('title', 'Erreur 404')

@section('content')


<!-- Erreur 404 -->
<div class="row">
    <div class="col-lg-12 text-center mt-5">
        <img src="{{asset('assets/img/404/404.jpg')}}" alt="Erreur 404">
    </div>
    <div class="col-lg-12 text-center text-bold">
        Erreur 404...
    	<br>
    	<span>Cette page n'existe pas. Vérifiez que l'url saisie est correcte.</span> <br>
		<a class="btn btn-cesi mt-3" href="/" role="button"><i class="fas fa-home"></i> Retourner à l'accueil</a>   
	</div>
@endsection
