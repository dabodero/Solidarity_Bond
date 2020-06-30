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

async function terminerCommande(id) {
    try {
        await inscrireCommandeTerminee(id);
        insertionDansCommandesRealisees(retirerCommandeRealisee(id));
    }catch(err){
        alert("Une erreur s'est produite et la commande n'a pas pu être terminée.")
    }
}

function retirerCommandeRealisee(id){
    let commandeATerminer = document.getElementById(id);
    document.getElementById("buttonDiv"+id).lastElementChild.remove();
    commandeATerminer.remove();
    return commandeATerminer;
}

function insertionDansCommandesRealisees(commandeAInscrire){
    let commande = null, commandes = document.getElementById("commandesRealisees");
    for(let i = 0; i<commandes.childElementCount;i++){
        if(new Number(commandeAInscrire.id)<new Number(commandes.childNodes[i].id)){
            commande=commandes.childNodes[i];
            break;
        }
    }
    document.getElementById("commandesRealisees").insertBefore(commandeAInscrire, commande);
}

function inscrireCommandeTerminee(id){
    return $.ajax({
        url: '/api/commande/'+id+'/terminer'+'?token='+getAPIToken(),
        type: 'put',
    });
}

function commandesNonTerminees(){
    $.ajax({
        url: '/api/commande/nonterminees'+'?token='+getAPIToken(),
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response.length!=0){
                response.map(function(commande){
                    refreshElementCommande(commande, "commandesARealiser", true);
                });
            } else {
                $("#commandesARealiser").append("Aucune commande à réaliser !");
            }
        }
    });
};

function commandesTerminees(){
    $.ajax({
        url: '/api/commande/terminees'+'?token='+getAPIToken(),
        type: 'get',
        dataType: 'json',
        success: function(response){
            response.map(function(commande){
                refreshElementCommande(commande, "commandesRealisees", false);
            });
        }
    });
};

function refreshElementCommande(commande, stringElementParent="", booleanBoutonTerminer=false){
    supprimerElementCommandeSiExiste(commande);
    creerElementCommande(commande, stringElementParent, booleanBoutonTerminer);
}

function supprimerElementCommandeSiExiste(commande) {
    let element = document.getElementById(commande.ID_Commande);
    if(element!=null){
        element.remove();
    }
}

function creerElementCommande(commande, stringElementParent="", booleanBoutonTerminer=false){
    $(document.getElementById(stringElementParent)).append(creerCommandeHTML(commande, booleanBoutonTerminer));
    let buttonsDiv = document.getElementById("buttonDiv"+commande.ID_Commande); //((document.getElementById(stringElementParent).lastElementChild).firstElementChild).lastElementChild;
    preparePopoverOnInformationButton(buttonsDiv.firstElementChild);
    if(booleanBoutonTerminer) {
        prepareTerminerButton(buttonsDiv.lastElementChild);
    }
}

function creerCommandeHTML(commande, booleanBoutonTerminer){
    let commandeHTML =
    "<div class=\"col-xl-2 col-lg-3 col-md-4 justify-content-center m-2\" id=\""+commande.ID_Commande+"\">" +
    "            <div class=\"row justify-content-center h-100\">" +
    "                <div class=\"card border-dark w-100\">" +
    "                    <div class=\"card-text card-head p-2\">" +
    "                        <h5 class=\"card-title text-center m-0\">Commande n°"+commande.ID_Commande+"</h5>" +
    "                    </div>" +
    "                    <ul class=\"list-group card-middle list-group-flush no-gutters h-100 pb-2\">" +
    "                        <div class=\"text-center no-gutters date mb-1\">"+(new Date(commande.Date)).toLocaleDateString('fr')+"</div>" +
    "                        <div class=\"row no-gutters pb-3 pr-3 pl-3\">" +
                                 creerProduits(commande)+
    "                        </div>" +
    "                    </ul>" +
    "                    <div class=\"card-text card-bottom text-center p-2\" id=\"buttonDiv"+commande.ID_Commande+"\">" +
    "                        <button type=\"button\" class=\"col-5 btn btn-info border-dark mr-1 ml-0\" data-trigger=\"focus\" data-container=\"body\" " +
    "                                data-toggle=\"popover\" data-placement=\"bottom\" title=\""+commande.Entreprise+"\" " +
    "                                data-content=\""+commande.Nom+" "+commande.Prenom+"<br/>"+telephoneFormat(commande.Telephone)+"\">" +
    "                            <i class=\"fas fa-info-circle\"></i>" +
    "                        </button>";
    if(booleanBoutonTerminer){
        commandeHTML+=terminerBouton(commande);
    }
    commandeHTML+=
    "                    </div>" +
    "                </div>" +
    "            </div>" +
    "</div>"
    return commandeHTML;
}

function terminerBouton(commande){
    return "<button type=\"button\" class=\"bouton-terminer col-5 btn btn-success border-dark ml-1 mr-0\" value="+commande.ID_Commande+"><i class=\"fas fa-check-circle\"></i></button>";
}

function creerProduits(commande){
    let produits="";
    commande['Produits'].map(function(produit){
        produits+=
            "<li class=\"list-group col-lg-10 col-md-9 col-8 m-0 p-0 produit\">" +
                 produit.Nom +
            "</li>" +
            "<li class=\"list-group col-lg-2 col-md-3 col-4 text-right m-0 p-0 produit\">" +
                 produit.Quantite +
            "</li>"
    });
    return produits;
}

function telephoneFormat(numero){
    let numeroFormate="";
    for(let i = 0; i<numero.length; i++){
        if(i%2==0 && i!=0){
            numeroFormate+=" ";
        }
        numeroFormate+=numero.charAt(i);
    }
    return numeroFormate;
}

function getAPIToken(){
    return $('meta[name="api-token"]').attr('content');
}

$(document).ready(function(){
    commandesNonTerminees();
    commandesTerminees();

    window.setInterval(commandesNonTerminees, 60000);
})

