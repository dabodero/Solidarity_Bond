function changerQuantite(quantite_id, quantite) {
    if(validerDonnees(quantite)) {
        let ID = quantite_id.split('_')[1];
        let ID_Produit = document.getElementById('ID_Produit_'+ID).value;
        let Token = $('meta[name="csrf-token"]').attr('content');
        let donnees = "ID_Produit=" + ID_Produit + "&Quantite=" + quantite + "&_token=" + Token;
        $.ajax({
            url: '/boutique/panier',
            type: 'post',
            data: donnees
        });
    }
}

function validerDonnees(quantite){
    if(quantite<0){
        throw new Error("Quantite impossible");
    }
    return true
}
