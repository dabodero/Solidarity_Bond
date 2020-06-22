@extends('layouts.app')

@section('title', 'À propos de nous')

@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/general/a-propos.css') }}">
@endsection

@section('content')

<div class="back1">

<div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">Vitre Anti Covid</h1>
        <p class="lead text-muted mb-0">Réduisons ensemble les risques de contaminations</p>

      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/illus_kftyh4.png" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fas fa-cogs fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Modulable</h2>
        <p class="font-italic text-muted mb-4">Vous avez un grand comptoir ? Un petit bureau ? Pas de panique. Notre produit est conçu pour être utilisé avec plusieurs vitres ou une seule afin d'ajuster la protection à son lieu d'utilisation.</p>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834139/img-1_e25nvh.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/img-2_vdgqgn.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fas fa-comments-dollar fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Gratuite</h2>
        <p class="font-italic text-muted mb-4">Dans le but de lutter activement contre le COVID-19, le CESI s'engage à offrir grâcieusement tous les produits disponibles sur ce site.</p><a href="https://www.cesi.fr/covid-19-cesi-sengage-a-travers-son-reseau-de-labcesi-pour-venir-en-aide-aux-professionnels-mobilises/" class="btn btn-light px-5 rounded-pill shadow-sm">En savoir plus</a>
      </div>
    </div>
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fas fa-user-friends fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Facile à utiliser</h2>
        <p class="font-italic text-muted mb-4">Notre produit est très simple d'utilisation. En effet, il suffit de relier les différentes vitres avec les attaches fournies et de poser l'ensemble sur les supports. Enfantin non ?</p>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834139/img-1_e25nvh.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>

  </div>
</div>

<div class="bg-light py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">Notre équipe</h2>
        <p class="font-italic text-muted">Nous sommes un groupe d'étudiant travaillant sur le projet Solidarity Bond, un projet développé par le CESI afin de lutter contre le COVID-19</p>
      </div>
    </div>

    <div class="row text-center">
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834132/avatar-4_ozhrib.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Bruno Clappe</h5><span class="small text-uppercase text-muted">Chef de projet</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834130/avatar-3_hzlize.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Gaultier Geelen</h5><span class="small text-uppercase text-muted">Webmaster</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-2_f8dowd.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Loïs Cèbe</h5><span class="small text-uppercase text-muted">Directeur Financier</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
  </div>
</div>
</div>
      <!-- End-->
<div class="bg-white">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
        <h2 class="display-4 font-weight-light mb-5">Le projet</h2>
        <h4 class="font-weight-light"> En ce temps de Covid-19 nous devions réaliser un dispositif permettant d’aider à lutter contre sa
        propagation. Il s’agissait de répondre à un besoin à l‘échelle locale ou régionale pour des établissements
        qui en font la demande.<br><br>
        Ce produit devait être réalisé, soit en l’ayant pensé nous-même soit en démarchant les entreprises
        pour obtenir leurs besoins en termes de protection. Il nous a fallu ensuite mettre en place une
        plateforme pour mettre en relation les entreprises demandeuses et le FabLab (fabricant) tout en
        répondant à leurs besoins respectifs au niveau des commandes.<br>

        Nous nous sommes très vite penchés sur le principe d'une vitre de protection, car c'était l'équipement de protection dont le marché
        n'avait pas encore été envahi. Afin d'ajouter une valeur à notre produit, nous l'avons pensé modulable, pour être utilisable sur
        n'importe quelle surface. C'est donc dans cette optique que nous avons commencé notre travail pour en arriver à sa production et
        sa distribution.
        </h4>
    </div>
  </div>
</div>

</div>

@endsection
