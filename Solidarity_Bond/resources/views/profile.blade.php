@extends('layouts.app')
@section('title',"Accueil")
@section('meta-description',"Page d'acceuil du site")
@section('content')


        
<div class= "selecteur">
<div class="container col-11 ">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" id="choice_1" class="list-group-item list-group-item-action btn-cesi">Mon compte</a>
              <a href="#" id="choice_2" class="list-group-item list-group-item-action">Historique des commandes</a>
              <a href="#" id="choice_3" class="list-group-item list-group-item-action">Mon panier</a>
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


@foreach($data as $d)
            @php $user = $d->utilisateur(); @endphp
		                    <form id="historic">
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Nom</label> 
                                <div class="col-8">
                                  <input id="champs" readonly="readonly" name="username" placeholder="{{$user->Nom}}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Prénom</label> 
                                <div class="col-8">
                                  <input id="champs2" name="name" readonly="readonly" placeholder="{{$user->Prenom}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mail</label> 
                                <div class="col-8">
                                  <input id="champs3" name="lastname" readonly="readonly" placeholder="{{$user->Mail}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Mot de Passe</label> 
                                <div class="col-8">
                                  <input id="champs4" name="text" readonly="readonly" placeholder="{{$user->MotDePasse}}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Entreprise</label> 
                                <div class="col-8">
                                  <input id="champs5" name="email" readonly="readonly" placeholder="{{$user->Entreprise}}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">SIRET</label> 
                                <div class="col-8">
                                  <input id="champs6" name="website" readonly="readonly" placeholder="{{$user->SIRET}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Téléphone</label> 
                                <div class="col-8">
                                  <input id="champs7" name="website" readonly="readonly" placeholder="{{$user->Telephone}}" class="form-control here" type="text">
                                </div>
                              </div>
                                      @endforeach

                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="target" name="submit" type="submit" class="btn btn-danger"><i class="fas fa-pen"></i>Mettre à jour mes données</button>
                                </div>
                              </div>
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


    // Gestion du clic et déplacement de l'image
    $("#target").click(function() {
document.getElementById('champs').readOnly = false ;
document.getElementById('champs2').readOnly = false ;
document.getElementById('champs3').readOnly = false ;
document.getElementById('champs4').readOnly = false ;
document.getElementById('champs5').readOnly = false ;
document.getElementById('champs6').readOnly = false ;
document.getElementById('target').innerHTML = '<button class="btn btn-success"><i class="fas fa-pen"></i>Mettre à jour mes données</button>';
         });

		$("#choice_1").click(function() {
			
location.reload();
     	
    
});



     $("#choice_2").click(function() {
     	document.getElementById('title').innerHTML = 'Historique des commandes';
    document.getElementById('historic').innerHTML = '@foreach($data as $d)            @php $user = $d->utilisateur(); @endphp <div class="card mb-2"> <h5 class="card-header">Commande n°{{$d->ID}}</h5> <div class="card-body"><h5 class="card-title">Etat : en cours</h5>    <p class="card-text"><ul>           @foreach($d->produits() as $produit)             <li>{{$produit->Quantite}} {{$produit->Nom}}</li>            @endforeach        </ul></p>  </div></div>@endforeach ';


});

     $("#choice_3").click(function() {
     	document.getElementById('title').innerHTML = 'Panier';
    document.getElementById('historic').innerHTML = 'Voici ton panier';
});


  });
</script>

<!--@foreach($data as $d)            @php $user = $d->utilisateur(); @endphp <div class="card"> <h5 class="card-header">Commande n°{{$d->ID}}</h5> <div class="card-body"><h5 class="card-title">Etat : en cours</h5>    <p class="card-text"><ul>           @foreach($d->produits() as $produit)             <li>{{$produit->Quantite}} {{$produit->Nom}}</li>            @endforeach        </ul></p>  </div></div>@endforeach-->


@endsection