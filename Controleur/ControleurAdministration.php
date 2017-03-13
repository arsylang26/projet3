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
        $this->commentaireAbusif = new commentaireAbusif();
    }

    public function recEpisode($titre = null, $contenu = null)
    {
        if ($titre && $contenu) {
            $this->episode->recEpisodes($titre, $contenu);
        }
        $vue = new Vue("Redaction");
        $vue->generer(array());
    }

    public function administration()
    {
        $vue = new Vue("Administration");
        $vue->generer(array());
    }

    public function accueilCommentairesAbusifs()
    {
        $commentairesAbusifs = $this->commentaireAbusif->getCommentairesAbusifs();
        $vue = new Vue("AccueilCommentaireAbusif");
        $vue->generer(array('commentaires' => $commentaireAbusif));
    }

}