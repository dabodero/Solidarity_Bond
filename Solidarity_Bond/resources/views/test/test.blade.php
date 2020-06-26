@extends('layouts.app')


@section('content')

    <div>
        @foreach($data as $d)
            <p>Le {{$d->Date}} : Commande {{$d->ID_Commande}} par {{$d->Nom}} {{$d->Prenom}} chez {{$d->Entreprise}}</p>
            <ul>
                @foreach($help as $produit)
                    <li>{{$produit->Quantite}} {{$produit->Nom}}</li>
                @endforeach
            </ul>
        @endforeach
    </div>




@endsection('content')
