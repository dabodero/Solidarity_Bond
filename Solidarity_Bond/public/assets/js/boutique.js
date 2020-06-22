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
