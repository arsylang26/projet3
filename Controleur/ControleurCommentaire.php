<?php
require_once 'Modele/Commentaire.php';
require_once 'Modele/Episode.php';
require_once 'Vue/Vue.php';
class ControleurCommentaire
{
    private $commentaire;
    
    public function __construct()
    {
        $this->commentaire = new Commentaire();
    }
    

    public function commenter($auteur,$contenu,$idEpisode,$parentCommentaire=null)
    {
        if (!$parentCommentaire) {
            $rangCommentaire=0;
        }
        else {//$rangCommentaire=modeleCommentaire
            $parent=$this->commentaire->getCommentaire($parentCommentaire);
            if ($parent){
                $rangCommentaire=$parentCommentaire['rang_commentaire']+1;

            }
            else{
                //redirection vers erreur
            }

        }
        $this->commentaire->ajouterCommentaire($auteur,$contenu,$idEpisode,$rangCommentaire,$parentCommentaire);
    
    }
    
    public function signalerAbusif($idCommentaire)
    {
        $this->commentaire->signCommentaireAbusif($idCommentaire);
    }

    public function affichAbusif()
    {
        $abusifs=$this->commentaire->getCommentairesAbusifs();
        $vue = new vue("Abusif");
        $vue->generer(array('abusifs'=>$commentairesAbusifs));
    }
}