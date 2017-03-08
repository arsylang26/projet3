<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurEpisode.php';
require_once 'Controleur/ControleurAdministration.php';
require_once 'Vue/Vue.php';

class Routeur
{
    private $ctrlAccueil;
    private $ctrlEpisode;

    private $ctrlAdministration;
    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlEpisode = new ControleurEpisode();
        $this->ctrlAdministration = new ControleurAdministration();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'episode') {
                    $idEpisode = intval($this->getParametre($_GET, 'id'));
                    if ($idEpisode != 0) {
                        $this->ctrlEpisode->episode($idEpisode);
                    } else
                        throw new Exception("Identifiant de l'épisode non valide");
                } elseif ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idEpisode = $this->getParametre($_POST, 'id');
                    $this->ctrlEpisode->commenter($auteur, $contenu, $idEpisode);
                }
                elseif ($_GET['action']=='recEpisode') {
                    if (isset ($_POST['titre'])) {
                        $titre = $this->getParametre($_POST, 'titre');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $this->ctrlAdministration->recEpisode($titre, $contenu);
                    }
                    else{
                        $this->ctrlAdministration->recEpisode();
                    }
                }
                elseif($_GET['action']=='administration'){
                    $this->ctrlAdministration->administration();
                }
                else
                    throw new Exception("Action non valide");
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }
}