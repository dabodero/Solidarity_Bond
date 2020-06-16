@extends('layouts.app')

@section('title', 'Fablab')

@section('content')
    <div class="row justify-content-center m-2">
        @foreach($commandesNonTerminees as $commandeNonTerminee)
            <div class="col-xl-2 col-lg-3 col-md-4 m-2">
                <div class="card border-dark">
                    <div class="card-text card-head p-2">
                        <h5 class="card-title text-center m-0">Commande n°{{$commandeNonTerminee->ID_Commande}}</h5>
                    </div>
                    <ul class="list-group card-middle list-group-flush m-0 p-0">
                        <div class="row col-12 m-0 p-3">
                            <li class="list-group col-lg-10 col-md-9 col-sm-8 m-0 p-0">
                                {{$commandeNonTerminee->Produit}}
                            </li>
                            <li class="list-group col-lg-2 col-md-3 col-sm-4 text-right m-0 p-0">
                                {{$commandeNonTerminee->Quantite}}
                            </li>
                        </div>
                    </ul>
                    <div class="card-text card-bottom text-center p-2">
                        <button type="button" class="col-6 btn btn-info border-dark mr-1 ml-0" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Yolo"><i class="fas fa-info-circle"></i></button>
                        <button type="button" class="col-5 btn btn-success border-dark ml-1 mr-0"><i class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
