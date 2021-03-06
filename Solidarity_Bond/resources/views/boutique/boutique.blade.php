@extends('layouts.app')

@section('title', 'Boutique')

@section('meta-description', 'Le boutique du site')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique/boutique.css') }}">
@endsection

@section('ajoutsScripts')
    <script src="{{asset('assets/js/boutique.js')}}"></script>
@endsection


@section('content')

    <div class="container text-center">
        <div class="row mt-5">
            @foreach($produits as $produit)
                <div class="col-xl-4 col-lg-6 col-sm-12 my-3">
                    <div class="card h-100">
                        <span class="span_{{$produit->ID}}" onclick="pageProduit(this.className)">
                            <div class="card-header btn-cesi">{{$produit->Nom}}</div>
                            @php $premierePhoto = $produit->photos()->first(); @endphp
                            <img class="card-img-top"
                                 src="{{asset(__($premierePhoto['CheminAcces']).__($premierePhoto['Nom']))}}"
                                 alt="{{$premierePhoto['Description']}}">
                        </span>
                        <div class="card-body">
                            <h5 class="card-title">{{$produit->Nom}}</h5>
                            <div class="card-block card-size-standard">
                                <div class="hidden-scrollbar">
                                    <div class="card-text inner-hidden-scrollbar">
                                        {{$produit->Description}}
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 p-0 justify-content-center align-items-end">
                                <a type="button" href="{{route('produit', ['ID_Produit' => $produit->ID])}}"
                                   class="btn btn-outline-primary mx-2">En savoir plus</a>
                                @auth
                                    @client
                                    <button id={{$produit->ID}} type="button" class="btn btn-outline-primary mx-2"
                                            onclick="incrementerQuantite(this.id)">Ajouter au panier
                                    </button>
                                    @endclient
                                @endauth
                                <input id="Nom_{{$produit->ID}}" type="text" name="Produit" value="{{$produit->Nom}}" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection

