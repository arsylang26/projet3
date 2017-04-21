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


    public function commenter($auteur, $contenu, $idEpisode, $parentCommentaire = null)
    {
        try {
            if (!$parentCommentaire) { //s'il était null alors
                $rangCommentaire = 0; // c'est le commentaire de l'épisode
            } else {                  // sinon c'est un commentaire de commentaire
                var_dump($parentCommentaire);
                $parent = $this->commentaire->getCommentaire($parentCommentaire)->fetch(); //on va chercher le parent
                var_dump($parent);
                if ($parent && $parent['rang'] < 3) {     // s'il existe, on définit le rang du commentaire comme futur parent
                    $rangCommentaire = $parent['rang'] + 1;

                } else {
                    throw new exception ("erreur dans le rang du commentaire");
                }

            }
        } catch
        (Exception $e) {
            $this->erreur($e->getMessage());
        }

        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire);
        header("location:index.php?action=episode&id=" . $idEpisode);
    }

    public function signalerAbusif($idEpisode,$idCommentaire)
    {
        $this->commentaire->signCommentaireAbusif($idCommentaire);
        header("location:index.php?action=episode&id=" . $idEpisode);
    }


    public function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}