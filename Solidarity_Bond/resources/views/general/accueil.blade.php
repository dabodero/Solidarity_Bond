@extends('layouts.app')
@section('title',"Accueil")
@section('meta-description',"Page d'accueil du site")

@flash('mailEnvoye')
@include('layouts.flash', ['variable'=>'mailEnvoye'])
@endflash

@section('content')


    <!--Section: Carousel de présentation-->


    <div class="container col-11 mt-5">
        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active text-center">
                    <img class="d-block mx-auto w-75" src="{{asset('assets/img/Produit_Fini/Produit_Fini_1.png')}}"
                         alt="Produit final">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto w-75" src="{{asset('assets/img/Attache/Attache_1.png')}}"
                         alt="Exemple d'attache">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto w-75" src="{{asset('assets/img/livraison.png')}}" alt="Livraison">
                </div>
            </div>
        </div>
        <h1 class="section-heading font-weight-light text-center mt-2 mb-5">Equipez votre lieu de travail gratuitement
            afin de lutter contre le COVID-19</h1>
    </div>

    <!--Section: Affichage du top 3 commentaires-->

    <section class="section pb-3 text-center container col-11 bg-light ">
        <h1 class="section-heading h1 pt-4">Commentaires</h1>
        <p class="section-description">Les avis les plus pertinents, pour vous aider à faire le meilleur choix</p>
        <div class="row">
            @foreach($top3 as $top)
                @php $utilisateur = $top->utilisateur(); @endphp
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card testimonial-card">
                        <div class="card-up deep-purple lighten-2"></div>
                        <div class="avatar mx-auto white"></div>
                        <div class="card-body">
                            <h4 class="card-title mt-1">{{$utilisateur->Nom}} {{$utilisateur->Prenom}}
                                , {{$utilisateur->Entreprise}}</h4>
                            <hr>
                            <p><i class="fas fa-quote-left"></i> {{$top->Commentaire}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!--Section: Partenaire-->
    <section id="Partenaires" class="section pb-3 text-center container col-11">
        <h1 class="section-heading h1 pt-4">Partenaires</h1>
        <p class="section-description">Ils ont fait le choix de nous soutenir dans notre projet</p>
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card-up deep-purple lighten-2"></div>
                <div class="avatar mx-auto w-100 white"><img src="{{ asset('assets/img/logo_cesi.png') }}"
                                                             alt="avatar mx-auto white" class="rounded img-fluid"></div>
                <div class="card-body">
                    <h4 class="card-title mt-1"><a href="https://www.cesi.fr/" class="text-dark">CESI</a></h4>
                    <hr>
                    <div class="bg-light border">
                        <p>Ecole d'ingénieurs</p>
                        <p><i class="fas fa-phone"> </i> 04 72 18 89 89</p>
                        <p><i class="fas fa-home"></i> 19 Avenue Guy de Collongue, 69130 Écully</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card-up deep-purple lighten-2"></div>
                <div class="avatar mx-auto w-100 white"><img src="{{ asset('assets/img/titi3.jpg.png') }}"
                                                             alt="avatar mx-auto white" class="rounded img-fluid"></div>
                <div class="card-body">
                    <h4 class="card-title mt-1"><a href="https://www.linkedin.com/in/titouan-narbey-7b63a4188/"
                                                   class="text-dark">Titouan Narbey</a></h4>
                    <hr>
                    <div class="bg-light border">
                        <p>Freelancer </p>
                        <p><i class="fab fa-github"></i><a href="https://github.com/TitouanNarbey"> Github</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card-up deep-purple lighten-2"></div>
                <div class="avatar mx-auto w-100 white"><img src="{{ asset('assets/img/sponso2.jpg') }}"
                                                             alt="avatar mx-auto white" class="rounded img-fluid"></div>
                <div class="card-body ">
                    <h4 class="card-title mt-1"><a href="http://www.vinsdecrenisse.com/" class="text-dark">Vins
                            decrenisses</a></h4>
                    <hr>
                    <div class="bg-light border">
                        <p>Exploitation viticole</p>
                        <p><i class="fas fa-phone"> </i> 04 72 18 94 67</p>
                        <p><i class="fas fa-home"></i> 911 Chemin du Petit Fromentin, 69380 Chasselay</p>
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection
