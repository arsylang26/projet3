<?php
require_once 'Modele/Episode.php';
require_once 'Vue/Vue.php';
class ControleurAccueil 
    {
    private $episode;
    public function __construct()
    {
        $this->episode = new Episode();
    }
// Affiche la liste de tous les épisodes du blog
    public function accueil() 
    {
        $episodes = $this->episode->getEpisodes();
        $vue = new Vue("Accueil");
        $vue->generer(array('episodes' => $episodes));
    }
}
