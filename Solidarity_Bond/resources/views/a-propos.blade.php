@extends('layouts.app')

@section('title', 'À propos de nous')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/a-propos.css') }}">
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/img/covid19-coronavirus-disease-concept-patient-600w-1671032311.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container text-center ">
       <h1 ><p class="titre" >Qui sommes nous ?</p></h1>
        <h6><p>dsqdjsfdsld fshd fsdhfjkqmds hqs yhqsdljnqsmldbq sdqsj mjhsfkhdsg dKMJHQIKSDHBQKSFDSJ BSK LKQNSFKkl nbskdfk  dsqdjsfdsld fshd fsdhfjkqmds hqs yhqsdljnqsmldbq sdqsj mjhsfkhdsg dKMJHQIKSDHBQKSFDSJ BSK LKQNSFKkl nbskdfk dsqdjsfdsld fshd fsdhfjkqmds hqs yhqsdljnqsmldbq sdqsj mjhsfkhdsg dKMJHQIKSDHBQKSFDSJ BSK LKQNSFKkl nbskdfk dsqdjsfdsld fshd fsdhfjkqmds hqs yhqsdljnqsmldbq sdqsj mjhsfkhdsg dKMJHQIKSDHBQKSFDSJ BSK LKQNSFKkl nbskdfk </p></h6>
    </div>


@endsection

