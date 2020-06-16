@extends('layouts.app')
@section('title',"Accueil")
@section('meta-description',"Page d'acceuil du site")
@section('content')


<div class= "selecteur">
<div class="container col-11 ">
	<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <a href="#" class="list-group-item list-group-item-action btn-cesi">Mon compte</a>
              <a href="#" class="list-group-item list-group-item-action">Historique des commandes</a>
              <a href="#" class="list-group-item list-group-item-action">Mon panier</a>
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Votre profil</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Nom</label> 
                                <div class="col-8">
                                  <input id="champs" readonly="readonly" name="username" placeholder="Cèbe" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Prénom</label> 
                                <div class="col-8">
                                  <input id="champs" name="name" readonly="readonly" placeholder="Loïs" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mail</label> 
                                <div class="col-8">
                                  <input id="champs" name="lastname" readonly="readonly" placeholder="lois.cebe@viacesi.fr" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Mot de Passe</label> 
                                <div class="col-8">
                                  <input id="champs" name="text" readonly="readonly" placeholder="eggplant55" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Entreprise</label> 
                                <div class="col-8">
                                  <input id="champs" name="email" readonly="readonly" placeholder="Le Cocoon" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">SIRET</label> 
                                <div class="col-8">
                                  <input id="champs" name="website" readonly="readonly" placeholder="544565856" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-danger">Mettre à jour mes données</button>
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

<img id="target" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg">
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script> 
$(function() {

    // Dimensions de la fenêtre
    var largeur = ($(window).width()) - 50;
    var hauteur = ($(window).height()) - 50;

    // Affichage de la première image en (100, 100)
    var p = $('#target').offset();
    p.top=100;
    p.left=100;
    $('#target').offset(p);
    
    // Gestion du clic et déplacement de l'image
    $("#target").click(function() {
document.getElementById('champs').readOnly = false;
    	//$( ".selecteur" ).remove();

      x = Math.floor(Math.random()*largeur);
      y = Math.floor(Math.random()*hauteur);
      var p = $('#target').offset();
      p.top = y;
      p.left = x;
      $('#target').offset(p);
    });
  });
</script>








@endsection