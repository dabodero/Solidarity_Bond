<body>
    <!-- Message Commande Terminées-->
    <div class="container-md">
        <h1>Votre commande est terminée !</h1>
        <div>
            <h2>Commande n°{{$commande->ID}}</h2>
            <ul>
                @foreach($commande->produitsFormates() as $produit)
                    <li>{{$produit->Quantite}} x {{$produit->Nom}}</li>
                @endforeach
            </ul>
            <p>Vous pouvez venir la retirer au CESI de Lyon : 19 Avenue Guy de Collongues. Assurez-vous de vous annoncer à l'avance.</p>
        </div>
    </div>
</body>


