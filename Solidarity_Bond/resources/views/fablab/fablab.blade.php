@extends('layouts.app')

@section('title', 'Fablab')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/fablab.css') }}">
@endsection

@section('ajoutsScripts')
    <script src="{{asset('assets/js/fablab.js')}}" crossorigin="anonymous"></script>
@endsection

@section('content')
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

    <div class="row justify-content-center" id="commandesRealisees">

    </div>

@endsection

@section('commandesARealiser')
    @foreach($commandesNonTerminees as $commandeNonTerminee)
        <div class="col-xl-2 col-lg-3 col-md-4 m-2" id="{{$commandeNonTerminee->ID_Commande}}">
            <div class="card border-dark">
                <div class="card-text card-head p-2">
                    <h5 class="card-title text-center m-0">Commande n°{{$commandeNonTerminee->ID_Commande}}</h5>
                </div>
                <ul class="list-group card-middle list-group-flush m-0 p-0">
                    <div class="text-center no-gutters date mb-1">{{\Carbon\Carbon::parse($commandeNonTerminee->Date)->translatedFormat('d/m/Y')}}</div>
                    <div class="row col-12 m-0 pb-3 pr-3 pl-3">
                        @foreach($commandeNonTerminee->Produits as $produit)
                            <li class="list-group col-lg-10 col-md-9 col-sm-8 m-0 p-0 produit">
                                {{$produit->Nom}}
                            </li>
                            <li class="list-group col-lg-2 col-md-3 col-sm-4 text-right m-0 p-0 produit">
                                {{$produit->Quantite}}
                            </li>
                        @endforeach
                    </div>
                </ul>
                <div class="card-text card-bottom text-center p-2">
                    <button type="button" class="col-5 btn btn-info border-dark mr-1 ml-0" data-trigger="focus" data-container="body"
                            data-toggle="popover" data-placement="bottom" title="{{$commandeNonTerminee->Entreprise}}"
                            data-content="{{$commandeNonTerminee->Nom}} {{$commandeNonTerminee->Prenom}}<br/>{{$commandeNonTerminee->Telephone}}">
                        <i class="fas fa-info-circle"></i>
                    </button>
                    <button type="button" class="bouton-terminer col-5 btn btn-success border-dark ml-1 mr-0" value={{$commandeNonTerminee->ID_Commande}}><i class="fas fa-check-circle"></i></button>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('commandesRealisees')

    @foreach($commandesTerminees as $commandeTerminee)
        <div class="col-xl-2 col-lg-3 col-md-4 m-2" id="{{$commandeTerminee->ID_Commande}}">
            <div class="card border-dark">
                <div class="card-text card-head p-2">
                    <h5 class="card-title text-center m-0">Commande n°{{$commandeTerminee->ID_Commande}}</h5>
                </div>
                <ul class="list-group card-middle list-group-flush m-0 p-0">
                    <div class="text-center no-gutters date mb-1">{{\Carbon\Carbon::parse($commandeTerminee->Date)->translatedFormat('d/m/Y')}}</div>
                    <div class="row col-12 m-0 pb-3 pr-3 pl-3">
                        @foreach($commandeTerminee->Produits as $produit)
                            <li class="list-group col-lg-10 col-md-9 col-sm-8 m-0 p-0 produit">
                                {{$produit->Nom}}
                            </li>
                            <li class="list-group col-lg-2 col-md-3 col-sm-4 text-right m-0 p-0 produit">
                                {{$produit->Quantite}}
                            </li>
                        @endforeach
                    </div>
                </ul>
                <div class="card-text card-bottom text-center p-2">
                    <button type="button" class="col-5 btn btn-info border-dark mr-1 ml-0" data-trigger="focus" data-container="body"
                            data-toggle="popover" data-placement="bottom" title="{{$commandeTerminee->Entreprise}}"
                            data-content="{{$commandeTerminee->Nom}} {{$commandeTerminee->Prenom}}<br/>{{$commandeTerminee->Telephone}}">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach

@endsection
