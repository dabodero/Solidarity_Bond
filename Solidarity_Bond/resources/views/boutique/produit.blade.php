@extends('layouts.app')

@section('title', __('Produit : '.$title))

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique/produit.css') }}">
    <input id="ID_Utilisateur" value="{{auth()->id()}}" hidden>
    <input id="ID_Produit" value="{{$produit->ID}}" hidden>
@endsection

@section('ajoutsScripts')
    <script src="{{asset('assets/js/produit.js')}}"></script>
@endsection

@section('content')
@php $premiereImage=true; @endphp
<div class="container-fluid">
    <div class="row no-gutters justify-content-center mt-4">
        <div class="col-xl-6 col-lg-12 mr-md-4">
            <div id="carouselControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($produit->photos() as $photo)
                        @if($premiereImage)
                            <div class="carousel-item active text-center">
                            @php $premiereImage=false; @endphp
                        @else
                            <div class="carousel-item text-center">
                        @endif
                                <img class="d-block mx-auto w-100" src="{{asset(__($photo->CheminAcces).__('/').__($photo->Nom))}}" alt="{{asset($photo->Description)}}">
                            </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev side-navigator" href="#carouselControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next side-navigator" href="#carouselControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 ml-md-2">
       @auth  <div class="row h-50 align-items-end"> @endauth
       @guest <div class="row h-100 align-items-center"> @endguest
                <div class="col-12 presentation-produit pt-2 pb-2">
                    <div class="row justify-content-start no-gutters">
                        <h4 class="mt-3 nom-produit">{{$produit->Nom}}</h4>
                    </div>
                    <p class="text-justify">{{$produit->Description}}</p>
                    <div class="row justify-content-end no-gutters pb-2">
                        <a href="{{route('panier')}}" name="panier" class="btn btn-outline-success bouton-panier col-md-2 col-sm-3 col-4 mr-1"><i class="fas fa-shopping-basket"></i></a>
                        <button id="{{$produit->ID}}" type="submit" class="btn btn-warning btn-outline-warning col-md-2 col-sm-3 col-4 ml-1 bouton-ajout-panier" onclick="incrementerQuantite(this.id)"><i class="fas fa-plus"></i><i class="fas fa-cart-arrow-down"></i></button>
                        <input id="Nom" type="text" name="Produit" value="{{$produit->Nom}}" hidden>
                    </div>
                </div>
            </div>
            @auth
            <div class="row no-gutters h-50 align-items-end">
                <div class="col-12 pb-lg-4">
                    <label for="aireCommentaire" class="col-10 m-0 p-0 pl-2 accroche-commentaire">Exprimez-vous sur le produit :</label>
                    <textarea class="form-control" id="aireCommentaire" rows="4" maxlength="500" placeholder="Saisissez votre commentaire ici..."></textarea>
                    <input type="submit" onclick="posterCommentaire()" class="col-12 btn btn-outline-primary bouton-commentaire mt-2" value="Envoyer le commentaire"></input>
                </div>
            </div>
            @endauth
        </div>
    </div>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-10">
            <hr class="separation"/>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-12 titre-section-commentaire text-center text-dark">
            Qu'en pensent nos utilisateurs ?
        </div>
    </div>
    <div id="espaceCommentaires" class="row no-gutters my-5">
        @if($produit->commentaires()->isEmpty())

            <div id="no-comment" class="col-12 text-center">
                Pas de commentaire à afficher... Soyez le premier visiteur à en laisser un !
            </div>

        @else
            @foreach($produit->commentaires() as $commentaire)
                @php $utilisateur = $commentaire->utilisateur(); @endphp
                <div id="{{$commentaire->ID}}" class="col-lg-6 col-12 no-gutters mt-2 mb-2">
                    <div class="row col-10 offset-1 commentaire h-100">
                        <div class="card-body col-md-10 col-sm-12">
                            <h5 class="card-title">{{$utilisateur->Nom}}&nbsp;{{$utilisateur->Prenom}}, {{$utilisateur->Entreprise}}</h5>
                            <p class="card-text">{{$commentaire->Commentaire}}</p>
                        </div>
                        <div class="col-md-2 col-sm-12 mb-3">
                            <div class="row align-items-center h-100">
                                <div class="col text-center p-0 m-0">
                                    @auth
                                        <button type="submit" onclick="liker(this.value)" name="ajoutLike" class="input-like" value={{$commentaire->ID}}>
                                    @endauth
                                            <i class="fas fa-thumbs-up like pr-lg-2 pr-md-3"></i>
                                    @auth
                                        </button>
                                    @endauth
                                    <div id="likeCount_{{$commentaire->ID}}" class="like-number no-gutters">{{$commentaire->likesCount()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
