@extends('layouts.app')

@section('title', 'Panier')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique/panier.css') }}">
@endsection

@section('ajoutsScripts')
    <script src="{{asset('assets/js/panier.js')}}"></script>
@endsection

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="title text-center pb-5">
                <h1>Panier</h1>
            </div>
        </div>

        @if($panier==null)
            <h2 class="mt-5">Votre panier est vide ! Vous pouvez commencer vos achats sur la boutique en cliquant <a
                    href="{{route('boutique')}}">ici</a>.</h2>
        @else
            <div class="row justify-content-center">
                <div class="col-12">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th scope="col">Article</th>
                            <th scope="col" class=" mr-5">Quantité</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($panier as $produit)
                            <tr>
                                <td scope="row"><input id="ID_Produit_{{$produit['ID']}}" name="{{$produit['Nom']}}[ID]"
                                                       form="validation" type="text" value="{{$produit['ID']}}"
                                                       hidden>{{$produit['Nom']}}</td>
                                <td><input id="Quantite_{{$produit['ID']}}" name="{{$produit['Nom']}}[Quantite]"
                                           form="validation" type="number" min=1 value="{{$produit['Quantite']}}"
                                           placeholder="1" onchange="changerQuantite(this.id, this.value)" required>
                                </td>
                                <td>
                                    <form action="{{route('supprimerDuPanier', ['ID_Produit' => $produit['ID']])}}"
                                          method="post" class="d-inline-block no-gutters form-button">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="text-center my-5">
                        <form id="validation" action="{{route('validerCommande')}}" method="post"
                              class="d-inline-block no-gutters form-button" hidden>
                            @csrf
                            <button type="submit" class="btn btn-success"><h3>Valider la commande</h3></button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

