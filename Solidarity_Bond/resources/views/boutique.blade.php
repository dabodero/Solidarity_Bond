@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique.css') }}">
@endsection

@section('content')



 <div class="container text-center">
    <div class="row">
        @foreach($Produits as $produit)
        <div class="col-sm-4">
            <div class="card mt-5">
                <img class="card-img-top" src="{{$produit->photos()->first()->CheminAcces}}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"></p>

                    <a type="button" href="{{route('produit', ['ID_Produit' => 2])}}" class="btn btn-outline-primary mr-2">En savoir plus</a>
                    <button type="button" class="btn btn-outline-primary ml-2">Ajouter au panier</button>

                </div>
            </div>
        </div>
        @endforeach
    </div>
 </div>


@endsection

