@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique/boutique.css') }}">
@endsection

@section('content')



 <div class="container text-center">
    <div class="row">
        @foreach($produits as $produit)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mt-5">
                <div class="card-header">{{$produit->Nom}}</div>
                @php $premierePhoto = $produit->photos()->first(); @endphp
                <img class="card-img-top" src="{{asset(__($premierePhoto->CheminAcces).__($premierePhoto->Nom))}}" alt="{{$premierePhoto->Description}}">
                <div class="card-body">
                    <h5 class="card-title">{{$produit->Nom}}</h5>
                    <div class="card-block card-size-standard">
                        <div class="hidden-scrollbar">
                            <div class="card-text inner-hidden-scrollbar">
                                {{$produit->Description}}
                            </div>
                        </div>
                    </div>
                    <a type="button" href="{{route('produit', ['ID_Produit' => $produit->ID])}}" class="btn btn-outline-primary mr-2">En savoir plus</a>
                    <form action="{{route('ajouterAuPanier', ['ID_Produit' => $produit->ID])}}" method="post" class="d-inline-block no-gutters form-button">
                        @csrf
                        <input type="submit" class="btn btn-outline-primary ml-2" value="Ajouter au panier">
                        <input type="text" name="Produit" value="{{$produit->Nom}}" hidden>
                        <input type="number" name="Quantite" value=1 hidden>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
 </div>


@endsection

