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
    // Ajoute un commentaire à un épisode
    public function commenterEpisode($auteur, $contenu, $idEpisode,$rangCommentaire,$parentCommentaire)
    {
        // Sauvegarde du commentaire

        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idEpisode,$rangCommentaire,$parentCommentaire);// le rang=0 -> parent=id du commentaire
        // Actualisation de l'affichage du billet
        $this->episode($idEpisode);
    }
  }
