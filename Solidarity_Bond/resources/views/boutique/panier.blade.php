@extends('layouts.app')

@section('title', 'Panier')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique/panier.css') }}">
@endsection

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="title text-center pb-5">
            Panier
        </div>
    </div>

    @if($panier==null)
        Votre panier est vide !
    @else
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($panier as $produit)
                    <tr>
                        <input name="{{$produit['Nom']}}[ID]" form="validation" type="text" value="{{$produit['ID']}}" hidden>
                        <td scope="row">{{$produit['Nom']}}</td>
                        <td><input name="{{$produit['Nom']}}[Quantite]" form="validation" type="number" min=1 value="{{$produit['Quantite']}}" placeholder="1" required></td>
                        <td>
                            <form action="{{route('supprimerDuPanier', ['ID_Produit' => $produit['ID']])}}" method="post" class="d-inline-block no-gutters form-button">
                                @csrf
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <form id="validation" action="{{route('validerCommande')}}" method="post" class="d-inline-block no-gutters form-button" hidden>
                            @csrf
                            <button type="submit" class="btn btn-success">Valider la commande</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection

@php /*
@section('content')

    <div class="title text-center pb-5">
        Panier
    </div>
    @if($articles->isEmpty())           {{-- si pas de panier --}}
    <div class="row m-4 p-4">
        <div class="col-lg-6 offset-3 text-center">
            <div class="text-bold">
                Pas d'article dans votre panier !
                <br>
                Allez visiter la boutique !!
                <hr>
            </div>
        </div>
        <div>
            &nbsp
        </div>
        <div class="col-lg-12 text-center">
            <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSKuxfXksQIPvXRbB5h9sEBM3HC-GuLqmG1MRI2-RrWu8q8o8i&s"
                alt="" class="img-fluid">
        </div>
    </div>
    @else           {{-- Affichage du panier--}}
    <div class="content full-height">
        <div class="container">
            <div class="row col-12">
                <div class="bg-white rounded shadow-sm row col-6">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Produit</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Prix</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantité</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Supprimer</div>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($articles as $article)           {{--liste les article de votre commande--}}
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}">
                                            <img src="{{$article->urlImage}}" alt="Article 1" width="70"
                                                 class="img-fluid rounded shadow-sm">
                                        </a>
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"><a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}" class="text-dark d-inline-block align-middle">{{$article->nom}}</a>
                                            </h5><span
                                                class="text-muted font-weight-normal font-italic d-block">Catégorie : {{$article->categorie}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{$article->prix}}€</strong></td>
                                <td class="border-0 align-middle"><strong></strong>
                                    <form name="myform" method="get" action="{{ URL::action('PanierController@addQuantite', [$article->id_commande ,$article->id_produit]) }}">           {{-- Modification de la quantite--}}
                                        <select onchange='this.form.submit()' class="custom-select mr-sm-2" id="inlineFormCustomSelect"name="quantite">
                                            <option value="1" autofocus>{{$article->Quantite}}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </form>
                                <td class="border-0 align-middle"><a href="{{ URL::action('PanierController@delete', [$article->id_commande ,$article->id_produit]) }}" class="text-dark">
                                        <i class="fa fa-trash fa-2x"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class=" bg-white rounded shadow-sm col-6">           {{-- Recapitulatif + total --}}
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Récapitulatif
                        de commande
                    </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">
                            Les frais d’expédition et les frais supplémentaires sont calculés en fonction des
                            valeurs que vous avez entrées.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Prix des articles </strong><strong>{{$totale}}€</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Frais de port</strong><strong>10€</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Taxe</strong><strong>0€</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{$totale + 10}}€</h5>
                            </li>
                        </ul>
                        <a href="{{ URL::action('PaymentController@payWithpaypal',  [$total=($totale + 10),$id_commande]) }}" class="btn btn-dark rounded-pill py-2 btn-block">Proceder au payement</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endif

@endsection
*/
@endphp
