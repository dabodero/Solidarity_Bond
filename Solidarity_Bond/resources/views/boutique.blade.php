@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique.css') }}">
@endsection

@section('content')

 <div class="container text-center">
    <div class="row">
        <div class="col-sm-4">
            <div class="card mt-5">
                <img class="card-img-top" src="{{ asset('assets/img/covid19-coronavirus-disease-concept-patient-600w-1671032311.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <a type="button" href="{{route('produit', ['ID_Produit' => 2])}}" class="btn btn-outline-primary mr-2">En savoir plus</a>
                    <button type="button" class="btn btn-outline-primary ml-2">Ajouter au panier</button>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mt-5">
                <img class="card-img-top" src="{{ asset('assets/img/covid19-coronavirus-disease-concept-patient-600w-1671032311.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <button type="button" class="btn btn-outline-primary mr-2">En savoir plus</button>
                    <button type="button" class="btn btn-outline-primary ml-2">Ajouter au panier</button>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mt-5">
                <img class="card-img-top" src="{{ asset('assets/img/covid19-coronavirus-disease-concept-patient-600w-1671032311.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <button type="button" class="btn btn-outline-primary mr-2">En savoir plus</button>
                    <button type="button" class="btn btn-outline-primary ml-2">Ajouter au panier</button>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mt-5">
                <img class="card-img-top" src="{{ asset('assets/img/covid19-coronavirus-disease-concept-patient-600w-1671032311.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <button type="button" class="btn btn-outline-primary mr-2">En savoir plus</button>
                    <button type="button" class="btn btn-outline-primary ml-2">Ajouter au panier</button>

                </div>
            </div>
        </div>
    </div>
 </div>
@endsection

