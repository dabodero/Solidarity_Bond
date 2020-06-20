async function posterCommentaire() {
    let ID_Utilisateur = document.getElementById('ID_Utilisateur').value;
    let ID_Produit = document.getElementById('ID_Produit').value;
    let Commentaire = document.getElementById('aireCommentaire').value;
    let donnees = "ID_Utilisateur=" + ID_Utilisateur + "&ID_Produit=" + ID_Produit + "&Commentaire=" + Commentaire;
    await $.ajax({
        url: '/api/commentaire',
        type: 'post',
        data: donnees,
        success: function (code, statut) {
            chargerCommentaires();
            document.getElementById('aireCommentaire').value="";
        }
    });

}

function chargerCommentaires(){
    let ID_Produit = document.getElementById('ID_Produit').value;
    $.ajax({
        url: '/api/produit/'+ID_Produit+'/commentaires',
        type: 'get',
        datatype: 'json',
        success: function(response) {
            if(response.length!=0){
                response.map(function(commentaire){
                    if(document.getElementById(commentaire.ID_Commentaire)==null){
                        if(ID_Utilisateur!=null){
                            com = creerCommentaire(commentaire, true);
                        } else {
                            com = creerCommentaire(commentaire, false);
                        }
                        $("#espaceCommentaires").append(com);
                    }
                });
            } else if($("#espaceCommentaires").isEmpty()){
                $("#espaceCommentaires").append(
                    "<div class=\"col-12\">" +
                        "Pas de commentaire à afficher... Soyez le premier visiteur à en laisser un !" +
                    "</div>"
                );
            }
        }
    })
}

function creerCommentaire(commentaire, visiteurAuthentifie){
    let commentaireDiv =
        "<div id=\""+commentaire.ID_Commentaire+"\" class=\"col-lg-6 col-12 no-gutters mt-2 mb-2\">" +
        "   <div class=\"row col-10 offset-1 commentaire h-100\">" +
        "       <div class=\"card-body col-md-10 col-sm-12\">" +
        "           <h5 class=\"card-title\">"+commentaire.Nom+"&nbsp;"+commentaire.Prenom+", "+commentaire.Entreprise+"</h5>" +
        "           <p class=\"card-text\">"+commentaire.Commentaire+"</p>" +
        "       </div>" +
        "       <div class=\"col-md-2 col-sm-12 mb-3\">" +
        "           <div class=\"row align-items-center h-100\">" +
        "               <div class=\"col text-center p-0 m-0\">" +
                            creerFonctionLike(commentaire, visiteurAuthentifie)+
        "               </div>" +
        "           </div>" +
        "       </div>" +
        "   </div>" +
        "</div>";

    return commentaireDiv;
}

function creerFonctionLike(commentaire, visiteurAuthentifie=false){
    let likeImage = "<i class=\"fas fa-thumbs-up like pr-lg-2 pr-md-3\"></i>";
    let likeCountDiv = "<div id=\"likeCount_"+commentaire.ID_Commentaire+"\" class=\"like-number no-gutters\">"+commentaire.Likes_Count+"</div>";
    like = "";

    if(visiteurAuthentifie){
        like+=
            "<button type=\"submit\" onclick=\"liker(this.value)\" class=\"input-like no-gutters\" value="+commentaire.ID_Commentaire+">"+
            likeImage+
            "</button>"+
            likeCountDiv;
    } else{
        like+=likeImage+likeCountDiv;
    }
    return like;

}

function liker(value) {
    let ID_Utilisateur = document.getElementById('ID_Utilisateur').value;

    $.ajax({
        url: '/api/commentaire/'+value+'/liker-unliker',
        type: 'post',
        data: 'ID_Utilisateur='+ID_Utilisateur,
        success: function(response) {
            setNombreLikesElement(value);
        }
    });

}

function setNombreLikesElement(ID){
    $.ajax({
        url: '/api/commentaire/'+ID+'/likesCount',
        type: 'get',
        datatype: 'json',
        success: function(response) {
            document.getElementById("likeCount_"+ID).innerText=response;
        }
    });
}


$(document).ready(function() {
   window.setInterval(chargerCommentaires, 60000);
});
