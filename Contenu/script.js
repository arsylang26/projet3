// confirmation de la suppression des commentaires sélectionnés
function confirmerSuppr()
{
    if (confirm("Êtes-vous sûr de supprimer ces commentaires ?"))
    {  
        supprCommentaire.submit();
    }
}
// affichage de la zone de saisie des commentaires au clic du bouton commenter 
 $("#commenter").click(function()
{
   $(".commentaire_form").show();
});

// masquer la zone de saisie au clic sur envoyer ou annuler
 §("#envoyerComm,#annulerComm,#abusifComm").click(function()
{
   $(".commentaire_form").hide();
});