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


    public function creerEpisode($titre = null, $contenu = null)
    {
        if ($titre && $contenu) {
            $this->episode->recEpisode($titre, $contenu);
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

    public function modifEpisode($id,$titre=null,$contenu=null)
    {
        $episode=$this->episode->getEpisode($id);

        if ($id && $titre && $contenu) {
            $episode['titre']=$titre;
            $episode['contenu']=$contenu;
            $this->episode->modEpisode($episode);
        }
       // $modEpisode= $this->episode->modEpisode($id);
        $vue = new Vue("Modif");
        $vue->generer(array('episode'=>$episode));
       // header("location:index.php?vueAccueil");
    }

    public function supprEpisode($id)
    {
        $supprEpisode = $this->episode->delEpisode($id);
        header("location:index.php?vueAccueil");
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