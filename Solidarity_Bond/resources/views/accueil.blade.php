@extends('layouts.app')
@section('title',"Accueil")
@section('meta-description',"Page d'acceuil du site")
@section('content')

<div class="container col-11">
	<!--Carousel Wrapper-->
	<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
	  	<!--Slides-->
	  	<div class="carousel-inner" role="listbox">   
	    	<div class="carousel-item active text-center">
	        	<img class="d-block mx-auto w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(135).jpg" alt="First slide">
	    	</div>
	    	<div class="carousel-item">
	      		<img class="d-block mx-auto w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg" alt="Second slide">
	    	</div>
	   		<div class="carousel-item">
	      		<img class="d-block mx-auto w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg" alt="Third slide">
	    	</div>
	  	</div>
	  	<!--/.Slides-->
	</div>
	<!--/.Carousel Wrapper-->
</div>





<!-- à remplacer la section commentary par un foreach qui affiche le top 3 like-->







<!--Section: Commentary-->
<section class="section pb-3 text-center container col-11">
  <!--Section heading-->
  <h1 class="section-heading h1 pt-4">Commentaires</h1>
  <!--Section description-->
  <p class="section-description">Les avis les plus pertinents, pour vous aider à faire le meilleur choix</p>
	<div class="row">
	    <!--Grid column-->
	    <div class="col-lg-4 col-md-12 mb-4">
	      	<!--Card-->
	      	<div class="card testimonial-card">
	        	<!--Background color-->
	        	<div class="card-up deep-purple lighten-2"></div>
	        	<!--Avatar-->
	        	<div class="avatar mx-auto white"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid"></div>
	        	<div class="card-body">
	          		<!--Name-->
	          		<h4 class="card-title mt-1">Maria Kate</h4>
	          		<hr>
	          		<!--Commentary-->
	          		<p><i class="fas fa-quote-left"></i> Un produit incroyable, qui à guérit mon cancer.</p>
	        	</div>
	      	</div>
	    </div>
	    <!--Grid column-->
	    <div class="col-lg-4 col-md-12 mb-4">
	      	<!--Card-->
	      	<div class="card testimonial-card">
	        	<!--Background color-->
	        	<div class="card-up deep-purple lighten-2"></div>
	        	<!--Avatar-->
	        	<div class="avatar mx-auto white"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid"></div>
	        	<div class="card-body">
	          		<!--Name-->
	          		<h4 class="card-title mt-1">Maria Kate</h4>
	          		<hr>
	          		<!--Commentary-->
	          		<p><i class="fas fa-quote-left"></i> Un produit incroyable, qui à guérit mon cancer.</p>
	        	</div>
	      	</div>	    
	    </div>
	    <div class="col-lg-4 col-md-12 mb-4">
	      	<!--Card-->
	      	<div class="card testimonial-card">
	        	<!--Background color-->
	        	<div class="card-up deep-purple lighten-2"></div>
	        	<!--Avatar-->
	        	<div class="avatar mx-auto white"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid"></div>
	        	<div class="card-body">
	          		<!--Name-->
	          		<h4 class="card-title mt-1">Maria Kate</h4>
	          		<hr>
	          		<!--Commentary-->
	          		<p><i class="fas fa-quote-left"></i> Un produit incroyable, qui à guérit mon cancer.</p>
	        	</div>
	      	</div>	     
	    </div>
	</div>	
</section>


<!--Section: partnership-->
<section class="section pb-3 text-center container col-11">

  	<!--Section heading-->
 	 <h1 class="section-heading h1 pt-4">Partenaires</h1>
  	<!--Section description-->
  	<p class="section-description">Ils ont fait le choix de nous soutenir dans notre projet</p>
  	<div class="row">
    	<!--Grid column-->
    	<div class="col-lg-4 col-md-12 mb-4">
        		<!--Background color-->
        		<div class="card-up deep-purple lighten-2"></div>
        		<!--Avatar-->
        		<div class="avatar mx-auto w-100 white"><img src="{{ asset('assets/img/logo_cesi.png') }}" alt="avatar mx-auto white" class="rounded img-fluid"></div> 
        			<div class="card-body">
          				<!--Name-->
          				<h4 class="card-title mt-1"><a href="https://www.cesi.fr/">CESI</a></h4>
          				<hr>
          				<!--Quotation-->
          				<div class="bg-light">
          					<p>Ecole d'ingénieurs</p>
          					<p><i class="fas fa-phone"> </i> 04 72 18 89 89</p>
          					<p><i class="fas fa-home"></i> 19 Avenue Guy de Collongue, 69130 Écully</p>
          				</div>
        			</div>
        </div>				
		<div class="col-lg-4 col-md-12 mb-4">
        		<!--Background color-->
        		<div class="card-up deep-purple lighten-2"></div>
        		<!--Avatar-->
        		<div class="avatar mx-auto w-100 white"><img src="{{ asset('assets/img/titi3.jpg.png') }}" alt="avatar mx-auto white" class="rounded img-fluid"></div>
        		<div class="card-body">
          			<!--Name-->
          			<h4 class="card-title mt-1"><a href="https://www.linkedin.com/in/titouan-narbey-7b63a4188/">Titouan Narbey</a></h4>
          			<hr>
          			<!--Quotation-->
          			<div class="bg-light">
          				<p>Freelancer </p>
          				<p> <i class="fab fa-github"></i><a href="https://github.com/TitouanNarbey"> Github</a></p>
          			</div>
        		</div>
		</div> 
		<div class="col-lg-4 col-md-12 mb-4">
        		<!--Background color-->
        		<div class="card-up deep-purple lighten-2"></div>
        		<!--Avatar-->
        		<div class="avatar mx-auto w-100 white"><img src="{{ asset('assets/img/sponso2.jpg') }}" alt="avatar mx-auto white" class="rounded img-fluid"></div>
        		<div class="card-body ">
          			<!--Name-->
          			<h4 class="card-title mt-1"><a href="http://www.vinsdecrenisse.com/">Vins decrenisses</a></h4>
          			<hr>
          			<!--Quotation-->
          			<div class="bg-light">
          				<p>Exploitation viticole</p>
          				<p><i class="fas fa-phone"> </i> 04 72 18 94 67</p>
          				<p><i class="fas fa-home"></i> 911 Chemin du Petit Fromentin, 69380 Chasselay</p>
          			</div>
        		</div>
		</div> 
	</div>	
</section>
<!--Section: partnership-->






@endsection