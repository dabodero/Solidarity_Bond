@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique.css') }}">
@endsection

@section('content')



 <div class="container text-center">
    <div class="row">
        @foreach($Produits as $produit)
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
                    <button type="button" class="btn btn-outline-primary ml-2">Ajouter au panier</button>

                </div>
            </div>
        </div>
        @endforeach
    </div>
 </div>


@endsection

