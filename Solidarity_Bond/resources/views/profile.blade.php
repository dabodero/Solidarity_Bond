@extends('layouts.app')
@section('title',"Accueil")
@section('meta-description',"Page d'acceuil du site")
@section('content')


        
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

<div id="historic">
                              <form action="/updateData" method="post" class="mt-1">
                                        @csrf
                                       <input type="hidden" name="updateData"/>

                                       <div class="form-group row">
                                <label class="col-4 col-form-label">Nom</label> 
                                <div class="col-8">
                                  <input id="champs"  name="Nom" value="{{Auth::user()->Nom}}"  class="form-control here @error('Nom') is-invalid @enderror" required="required" type="text">
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
                                  <input id="champs"  name="Prenom" value="{{Auth::user()->Prenom}}" class="form-control here @error('Prenom') is-invalid @enderror" required="required" type="text">
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
                                  <input id="champs"  name="Mail" value="{{Auth::user()->Mail}}" class="form-control here @error('Mail') is-invalid @enderror" required="required" type="text">
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
                                  <input id="champs"  name="Entreprise" value="{{Auth::user()->Entreprise}}" class="form-control here @error('Entreprise') is-invalid @enderror" required="required" type="text">
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
                                  <input id="champs"  name="Telephone" value="{{Auth::user()->Telephone}}" class="form-control here @error('Telephone') is-invalid @enderror" required="required" type="text">
 @error('Telephone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-4 col-form-label">SIRET</label> 
                                <div class="col-8">
                                  <input id="champs"  name="SIRET" value="{{Auth::user()->SIRET}}" class="form-control here @error('SIRET') is-invalid @enderror" required="required" type="text">
 @error('SIRET')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                              </div>



                                       <button type="submit" class="btn btn-primary btn-block mt-2">Modifier les données</button>
                            </form>

                             <form action="/deleteUser" method="post" class="mt-1">
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


 
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script> 
$(function() {

		$("#choice_1").click(function() {
			
location.reload();
     	
    
});



     $("#choice_2").click(function() {

     	document.getElementById('title').innerHTML = 'Commandes en cours';
    document.getElementById('historic').innerHTML = '@foreach($data as $d)        <div class="card mb-2"> <h5 class="card-header">Commande n°{{$d->ID_Commande}} du {{$d->Date}}</h5> <div class="card-body"><h5 class="card-title">Etat : En cours    </h5>    <p class="card-text"><ul>      @foreach($help as $produit)                <li>{{$produit->Quantite}} {{$produit->Nom}}</li>            @endforeach     </div></div> @endforeach';
  });

            
     $("#choice_3").click(function() {
     	document.getElementById('title').innerHTML = 'Commandes terminées';
 document.getElementById('historic').innerHTML = '@foreach($data2 as $d)        <div class="card mb-2"> <h5 class="card-header">Commande n°{{$d->ID_Commande}} du {{$d->Date}}</h5> <div class="card-body"><h5 class="card-title">Etat : Terminée    </h5>    <p class="card-text"><ul>      @foreach($help2 as $produit)                <li>{{$produit->Quantite}} {{$produit->Nom}}</li>            @endforeach     </div></div> @endforeach';
  });
});


  
</script>



@endsection