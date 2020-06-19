@extends('layouts.app')

@section('title', 'Boutique')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/boutique.css') }}">
@endsection

@section('content')
    @foreach($Composerde as $composer)
    <div class="container text-center mt-5">
        <div class="row">
                <div class=" col-md-12">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Article</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$composer->Quantite}} </th>
            <td>{{$composer->Quantite}} </td>
            <td>Otto</td>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
        </tr>
        </tbody>
    </table>
                </div>
        </div>
    </div>
    @endforeach
@endsection
