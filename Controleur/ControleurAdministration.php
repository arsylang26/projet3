<?php
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurAdministration
{
    private $episode;
    private $commentaire;
    private $commentaireAbusif;

    public function __construct()
    {
        $this->episode = new Episode();
        $this->commentaire = new Commentaire();

    }
    
        public function administration()
    {
        $vue = new Vue("Administration");
        $vue->generer(array());
    }


    public function creerEpisode($titre = null, $contenu = null) // affiche TinyMCE pour l'édition
    {
        if ($titre && $contenu) {
            $this->episode->recEpisode($titre, $contenu);
        }
        $vue = new Vue("Redaction");
        $vue->generer(array());
    }


    public function affichAbusif($id)
    {
        $commentairesAbusifs = $this->commentaire->getCommentairesAbusifs();
        $vue = new Vue("Abusif");
        $vue->generer(array('commentaires' => $commentairesAbusifs));
    }
    public function modifEpisode($id)
    {
        $modEpisode= $this->episode->modEpisode($id);
        $vue = new Vue("Redaction");
        $vue->generer(array('episodes' => $modEpisode));
    }
    public function supprEpisode($id)
    {
        $supprEpisode = $this->episode->delEpisode($id);
        $vue = new Vue("SupprEpisode");
        $vue->generer(array('episodes' => $supprEpisode));
    }
    public function supprCommentaire($id)
    {
        $commentaireAbusif = $this->commentaire->delCommentaire($id);
        $vue = new Vue("SupprAbusif");
        $vue->generer(array('commentaires' => $commentaireAbusif));
    }
<<<<<<< HEAD
    
    public function adminEpisode()
        $vue = new Vue("AdminEpisode");
        $vue->generer(array());
    }
=======
    public function modifEpisode($id)
    {
        
    }
    public function supprEpisode($id)
    {
        
    }

>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
}