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
        try
        {
            if (!$parentCommentaire) {
                $rangCommentaire = 0; // c'est le commentaire de l'épisode
            } else {                  // sinon c'est un commentaire de commentaire
                $parent = $this->commentaire->getCommentaire($parentCommentaire); //on va chercher le parent
                if ($parent && $parentCommentaire['rang_commentaire'] < 3) {     // s'il existe on définit le rang du commentaire comme futur parent
                    $rangCommentaire = $parentCommentaire['rang_commentaire'] + 1;

                } else {
                    throw new exception ("erreur dans le rang du commentaire");
            }

            }
        }
        catch
        (Exception $e)
        {
            $this->erreur($e->getMessage());
        }
       // finally{

       // }
        $this->commentaire->ajouterCommentaire($auteur,$contenu,$idEpisode,$rangCommentaire,$parentCommentaire);
  // header('location:index.php');
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