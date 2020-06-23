function incrementerQuantite(ID_Produit) {
    let Produit = document.getElementById("Nom_"+ID_Produit).value;
    let Token = $('meta[name="csrf-token"]').attr('content');
    let donnees = "ID_Produit=" + ID_Produit + "&Produit=" + Produit + "&_token=" + Token;
    $.ajax({
        url: '/boutique/panier',
        type: 'post',
        data: donnees
    });
}

function pageProduit(ID_Produit_Span){
    let ID_Produit = ID_Produit_Span.split('_')[1];
    document.location.href='/boutique/produit/'+ID_Produit;
}
