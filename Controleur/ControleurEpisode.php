<?php
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurEpisode
    {
    private $episode;
    private $commentaire;
    public function __construct()
    {
        $this->episode= new Episode();
        $this->commentaire = new Commentaire();
    }
    // Affiche les détails sur un épisode
    public function episode($idEpisode) 
    {
        $episode = $this->episode->getEpisode($idEpisode);
        $commentaires = $this->commentaire->getCommentaires($idEpisode);
        $vue = new Vue("Episode");
        $vue->generer(array('episode' => $episode, 'commentaires' => $commentaires, 'modeleCommentaire'=>$this->commentaire)); // a comprendre
    }
}
