@extends('layouts.app')

@section('title', __('Produit : '.$title))

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/produit.css') }}">
@endsection

@section('content')
@php $premiereImage=true; @endphp

    <div class="row no-gutters mt-4 align-items-center">
        <div class="col-xl-6 col-lg-12 offset-xl-1 offset-lg-0 mr-md-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($produit->photos() as $photo)
                        @if($premiereImage)
                            <div class="carousel-item active text-center">
                            @php $premiereImage=false; @endphp
                        @else
                            <div class="carousel-item text-center">
                        @endif
                                <img class="d-block mx-auto w-100" src="{{asset(__($photo->CheminAcces).__('/').__($photo->Nom))}}" alt="First slide">
                            </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev side-navigator" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next side-navigator" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 ml-md-2 mb-lg-3">
            <div class="row no-gutters">
                <div class="col-12 no-gutters">
                    <div class="ml-2">
                        <h4 class="mt-3">{{$produit->Nom}}</h4>

                        <p class="text-justify">{{$produit->Description}}</p>
                        <form action="{{route('ajouterAuPanier', ['ID_Produit' => $produit->ID, 'Quantite'=>1])}}" method="post" class="">
                            @csrf
                            <input type="submit" name="ajoutProduit" class="btn btn-outline-primary ml-2 float-right" value="Ajouter au panier"></input>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 mt-lg-4">
                    <div class="form-group mb-5">
                        <label for="exampleFormControlTextarea1">Commentaire :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters mt-5">
        @foreach($produit->commentaires() as $commentaire)
            @php $utilisateur = $commentaire->utilisateur(); @endphp
            <div class="col-lg-6 col-12 no-gutters mt-2 mb-2">
                <div class="row col-10 offset-1 commentaire h-100">
                    <div class="card-body col-md-10 col-sm-12">
                        <h5 class="card-title">{{$utilisateur->Nom}}&nbsp;{{$utilisateur->Prenom}}, {{$utilisateur->Entreprise}}</h5>
                        <p class="card-text">{{$commentaire->Commentaire}}</p>
                    </div>
                    <div class="col-md-2 col-sm-12 mb-3">
                        <div class="row align-items-center h-100">
                            <div class="col text-center">
                                <form action="{{route("liker", ['Commentaire'=>$commentaire->ID])}}" method="post" class="no-gutters">
                                    @csrf
                                    <button type="submit" name="ajoutLike" class="input-like no-gutters" value={{$commentaire->ID}}>
                                        <i class="fas fa-thumbs-up like pr-lg-2 pr-md-3"></i>
                                    </button>
                                    <div id="likeCount" class="like-number no-gutters">{{$commentaire->likesCount()}}</div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
