@extends('layouts.app')


@section('content')

    <div>
        @foreach($data as $d)
            @php $user = $d->utilisateur(); @endphp
            <p>Commande {{$d->ID}} par {{$user->Nom}} {{$user->Prenom}} chez {{$user->Entreprise}}</p>
        <ul>
            @foreach($d->produits() as $produit)
                <li>{{$produit->Quantite}} {{$produit->Nom}}</li>
            @endforeach
        </ul>
        @endforeach
    </div>




@endsection('content')
