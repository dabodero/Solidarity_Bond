@extends('layouts.app')

@section('title',"Votre profil")

@section('meta-description',"Page de profil")
@section('ajoutsHead')
    <link rel="stylesheet" href="{{ asset('assets/css/profil/profil.css') }}">
@endsection
@section('content')

@flash('commandeValidee')
    @include('layouts.flash', ['variable'=>'commandeValidee'])
@endflash

<div class="container col-11 mt-2 ">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a id="choice_1" class="list-group-item list-group-item-action ">Mon compte</a>
              <a id="choice_2" class="list-group-item list-group-item-action ">Commandes en cours</a>
              <a id="choice_3" class="list-group-item list-group-item-action ">Commandes terminées</a>
            </div>
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4 id="title">Votre profil</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">

<div id="corps">
                              <form action="{{route('updateData')}}" method="post" class="mt-1">
                                        @csrf
                                       <input type="hidden" name="updateData"/>

                                       <div class="form-group row">
                                <label class="col-4 col-form-label">Nom</label>
                                <div class="col-8">
                                  <input id="Nom" name="Nom" value="{{Auth::user()->Nom}}"  class="form-control here @error('Nom') is-invalid @enderror" required="required" type="text">
                                  @error('Nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-4 col-form-label">Prénom</label>
                                <div class="col-8">
                                  <input id="Prenom"  name="Prenom" value="{{Auth::user()->Prenom}}" class="form-control here @error('Prenom') is-invalid @enderror" required="required" type="text">
@error('Prenom')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-4 col-form-label">Mail</label>
                                <div class="col-8">
                                  <input id="Mail"  name="Mail" value="{{Auth::user()->Mail}}" class="form-control here @error('Mail') is-invalid @enderror" required="required" type="text">
 @error('Mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-4 col-form-label">Entreprise</label>
                                <div class="col-8">
                                  <input id="Entreprise"  name="Entreprise" @if(Auth::user()->Entreprise!=null)value="{{Auth::user()->Entreprise}}" @else value="" placeholder="Vide" @endif class="form-control here @error('Entreprise') is-invalid @enderror" required="required" type="text">
@error('Entreprise')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-4 col-form-label">Téléphone</label>
                                <div class="col-8">
                                  <input id="Telephone"  name="Telephone" @if(Auth::user()->Telephone!=null)value="{{Auth::user()->Telephone}}" @else value="" placeholder="Vide" @endif class="form-control here @error('Telephone') is-invalid @enderror" required="required" type="text">
 @error('Telephone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>

                                       <button type="submit" class="btn btn-primary btn-block mt-2">Modifier les données</button>
                            </form>

                             <form action="{{route('deleteUser')}}" method="post" class="mt-1">
                                        @csrf
                                       <input type="hidden" name="User"/>
                                       <!-- Delete event -->
                                       <button type="submit" class="btn btn-danger btn-block mt-2">Supprimer le compte</button>
                            </form>
                            </div>
		                </div>
		            </div>

		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection

@section('ajoutsScripts')
<script>
    $(function() {

        $("#choice_1").click(function() {
            location.reload();
        });

        $("#choice_2").click(function() {
            document.getElementById('title').innerHTML = 'Commandes en cours';
            document.getElementById('corps').innerHTML = '@foreach($commandesNonTerminees as $commandeNonTerminee)        <div class="card mb-2"> <h5 class="card-header">Commande n°{{$commandeNonTerminee->ID_Commande}} du {{\Carbon\Carbon::parse($commandeNonTerminee->Date)->translatedFormat('d/m/Y')}}</h5> <div class="card-body"><h5 class="card-title">Etat : En cours    </h5>    <p class="card-text"><ul>      @foreach($commandeNonTerminee->produitsPourCommandeFormatee() as $produit)                <li>{{$produit->Quantite}} {{$produit->Nom}}</li>            @endforeach     </div></div> @endforeach';
        });

        $("#choice_3").click(function() {
            document.getElementById('title').innerHTML = 'Commandes terminées';
            document.getElementById('corps').innerHTML = '@foreach($commandesTerminees as $commandeTerminee)        <div class="card mb-2"> <h5 class="card-header">Commande n°{{$commandeTerminee->ID_Commande}} du {{\Carbon\Carbon::parse($commandeTerminee->Date)->translatedFormat('d/m/Y')}}</h5> <div class="card-body"><h5 class="card-title">Etat : Terminée    </h5>    <p class="card-text"><ul>      @foreach($commandeTerminee->produitsPourCommandeFormatee() as $produit)                <li>{{$produit->Quantite}} {{$produit->Nom}}</li>            @endforeach     </div></div> @endforeach';
        });
    });
</script>

@endsection
