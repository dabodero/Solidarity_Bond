function preparePopover(){
    $(function () {
        $('[data-toggle="popover"]').popover({
            html:true
        })
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })
}

function preparePopoverOnInformationButton(bouton){
    $(bouton).popover({
        html:true
    });

    $(bouton).popover({
        trigger: 'focus'
    });
}

function prepareTerminerButton(bouton){
    $(bouton).click(function(){
        terminerCommande(this.value);
    });
}

function terminerCommande(id){
    inscrireCommandeTerminee(id);
    let commandeATerminer = document.getElementById(id);
    commandeATerminer.remove();
    commandeATerminer.lastElementChild.lastElementChild.lastElementChild.remove();
    let commandes = document.getElementById("commandesRealisees");
    let commande = null;
    for(let i = 0; i<commandes.childElementCount;i++){/*
        console.log(commandeATerminer.id+' et '+commandes.childNodes[i].id);
        console.log(new Number(commandeATerminer.id)<new Number(commandes.childNodes[i].id));
        console.log(commandes.childNodes[i]);*/
        if(new Number(commandeATerminer.id)<new Number(commandes.childNodes[i].id)){
            commande=commandes.childNodes[i];
            break;
        }
    }
    document.getElementById("commandesRealisees").insertBefore(commandeATerminer, commande);
}

function inscrireCommandeTerminee(id){
    $.ajax({
        url: '/api/commande/'+id+'/terminer',
        type: 'get',
        dataType: 'json'
    });
}

function commandesNonTerminees(){
    $("#commandesARealiser").empty();
    $.ajax({
        url: '/api/commande/nonterminees',
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response.length!=0){
                response.map(function(commande){
                    creerElementCommande(commande, "commandesARealiser", true);
                });
            } else {
                $("#commandesARealiser").append("Aucune commande à réaliser !");
            }
        }
    });
};

function commandesTerminees(){
    $("#commandesRealisees").empty();
    $.ajax({
        url: '/api/commande/terminees',
        type: 'get',
        dataType: 'json',
        success: function(response){
            response.map(function(commande){
                creerElementCommande(commande, "commandesRealisees", false);
            });
        }
    });
};

function creerElementCommande(commande, stringElementParent="", booleanBoutonTerminer=false){
    $(document.getElementById(stringElementParent)).append(creerCommandeHTML(commande, booleanBoutonTerminer));
    let buttonsDiv = ((document.getElementById(stringElementParent).lastElementChild).firstElementChild).lastElementChild;
    preparePopoverOnInformationButton(buttonsDiv.firstElementChild);
    if(booleanBoutonTerminer) {
        prepareTerminerButton(buttonsDiv.lastElementChild);
    }
}

function creerCommandeHTML(commande, booleanBoutonTerminer){
    let commandeHTML =
    "<div class=\"col-xl-2 col-lg-3 col-md-4 m-2\" id=\""+commande.ID_Commande+"\">" +
    "                <div class=\"card border-dark\">" +
    "                    <div class=\"card-text card-head p-2\">" +
    "                        <h5 class=\"card-title text-center m-0\">Commande n°"+commande.ID_Commande+"</h5>" +
    "                    </div>" +
    "                    <ul class=\"list-group card-middle list-group-flush m-0 p-0\">" +
    "                        <div class=\"text-center no-gutters date mb-1\">"+(new Date(commande.Date)).toLocaleDateString('fr')+"</div>" +
    "                        <div class=\"row col-12 m-0 pb-3 pr-3 pl-3\">" +
                                 creerProduits(commande)+
    "                        </div>" +
    "                    </ul>" +
    "                    <div class=\"card-text card-bottom text-center p-2\">" +
    "                        <button type=\"button\" class=\"col-5 btn btn-info border-dark mr-1 ml-0\" data-trigger=\"focus\" data-container=\"body\" " +
    "                                data-toggle=\"popover\" data-placement=\"bottom\" title=\""+commande.Entreprise+"\" " +
    "                                data-content=\""+commande.Nom+" "+commande.Prenom+"<br/>"+commande.Telephone+"\">" +
    "                            <i class=\"fas fa-info-circle\"></i>" +
    "                        </button>";
    if(booleanBoutonTerminer){
        commandeHTML+=terminerBouton(commande);
    }
    commandeHTML+=
    "                    </div>" +
    "                </div>" +
    "            </div>"
    return commandeHTML;
}

function terminerBouton(commande){
    return "<button type=\"button\" class=\"bouton-terminer col-5 btn btn-success border-dark ml-1 mr-0\" value="+commande.ID_Commande+"><i class=\"fas fa-check-circle\"></i></button>";
}

function creerProduits(commande){
    let produits="";
    commande['Produits'].map(function(produit){
        produits+=
            "<li class=\"list-group col-lg-10 col-md-9 col-sm-8 m-0 p-0 produit\">" +
                 produit.Nom +
            "</li>" +
            "<li class=\"list-group col-lg-2 col-md-3 col-sm-4 text-right m-0 p-0 produit\">" +
                 produit.Quantite +
            "</li>"
    });
    return produits;
}

$(document).ready(function(){
    preparePopover();
    commandesNonTerminees();
    commandesTerminees();
})

