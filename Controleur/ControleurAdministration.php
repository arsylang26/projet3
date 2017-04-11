<?php
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurEpisode.php';

class ControleurAdministration
{
    private $episode;
    private $commentaire;


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


    public function creerEpisode($titre = null, $contenu = null,$modif=null,$id=null)
    {
        if ($titre && $contenu && !$modif) {
            $this->episode->recEpisode($titre, $contenu);
        }
        if ($titre && $contenu && $modif){
            $this->episode->modEpisode($id);
        }
        $vue = new Vue("Redaction");
        $vue->generer(array());
       // header("location:index.php?vueAccueil");
    }


    public function affichAbusif()
    {
        $commentairesAbusifs = $this->commentaire->getCommentairesAbusifs();
        $vue = new Vue("Abusif");
        $vue->generer(array());
    }

    public function modifEpisode($id)
    {
        $episode=$this->episode->getEpisode($id);
       // $modEpisode= $this->episode->modEpisode($id);
        $modif=1;
        $this->creerEpisode(null,null,$modif,$id);
        //$vue->generer(array('episodes' => $modEpisode));
       // header("location:index.php?vueAccueil");
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

    public function connectAdmin($admin,$pwd)
    {
      
        //verifier les champs admin pwd ouvrir $session verifier que tout est ok et
        $vue= new Vue("connectAdmin");
        $vue->generer(array());
    }
}