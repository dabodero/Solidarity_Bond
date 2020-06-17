@extends('layouts.app')

@section('title', 'Fablab')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/produit.css') }}">
@endsection

@section('content')

    <div class="row no-gutters">
        <div class="col-12 col-sm-5 col-md-1 ">
        </div>
        <div class="col-12 col-sm-5 col-md-6  ">
            <img class="card-img-top img-thumbnail ml-5 "
                 src="{{ asset('assets/img/covid19-coronavirus-disease-concept-patient-600w-1671032311.png') }}"
                 alt="Card image cap"></div>
        <div class="col-8 col-md-4 float-left ">
            <div class="ml-2">
                <h4 class="ml-3 mt-3"><p>THE PRODUIT</p></h4>

                <h6> Notre produit et ba franchement il est vraiment trop cool.Franchement il remplit de ouf l'est
                    Notre produit et ba franchement il est vraiment trop cool.Franchement il remplit de ouf l'estNotre
                    produit et ba franchement il est vraiment trop cool.Franchement il remplit de ouf l'estNotre produit
                    et ba franchement il est vraiment trop cool.Franchement il remplit de ouf l'est

                </h6>
                <div class="prix"><h3>70$</h3></div>
                <button type="button" class="btn btn-outline-primary ml-2 float-right ">Ajouter au panier</button>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-md-6"></div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Commentaire :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                dqsdqsdqsd
            </div>
            <div class="col-md-1">
            </div>

        </div>
@endsection
