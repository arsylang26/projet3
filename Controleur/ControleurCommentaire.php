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
    

    public function commenterCommentaire($auteur,$contenu,$idEpisode,$rangCommentaire,$parentCommentaire)
    {
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
        $vue->generer(array('abusifs'=>$abusifs));
    }
}