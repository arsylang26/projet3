<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCommentaire.php';
require_once 'Controleur/ControleurEpisode.php';
require_once 'Controleur/ControleurAdministration.php';
require_once 'Vue/Vue.php';

class Routeur
{
    private $ctrlAccueil;
    private $ctrlEpisode;
    private $ctrlCommentaire;
    private $ctrlAdministration;


    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlEpisode = new ControleurEpisode();
        $this->ctrlCommentaire = new ControleurCommentaire();
        $this->ctrlAdministration = new ControleurAdministration();

    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET(['action'])) {
                    case 'episode': //pour affichage épisode
                        $idEpisode = intval($this->getParametre($_GET, 'id'));
                        if ($idEpisode != 0) {
                            $this->ctrlEpisode->episode($idEpisode);
                        } else throw new Exception("Identifiant de l'épisode non valide");
                        break;

                    case 'recEpisode': //pour enregistrer un épisode
                        if (isset ($_POST['titre'])) {
                            $titre = $this->getParametre($_POST, 'titre');
                            $contenu = $this->getParametre($_POST, 'contenu');
                            $this->ctrlAdministration->recEpisode($titre, $contenu);
                        } else {
                            $this->ctrlAdministration->recEpisode();
                        }
                        break;

                    case 'modEpisode': //pour modifier un épisode
                        $id = $this->getParametre($_POST, 'id');
                        $this->ctrlAdministration->modEpisode($id);
                        break;

                    case 'supprEpisode': //pour effacement épisode et commentaires afférants
                        $id = $this->getParametre($_POST, 'id');
                        $this->ctrlAdministration->delEpisode($id);
                        break;

                    case 'commenter': //pour commenter un épisode ou un commentaire
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idEpisode = $this->getParametre($_POST, 'id');
                        $rangCommentaire = $this->getParametre($_POST, 'rang');
                        $parentCommentaire = $this->getParametre($_POST, 'parent');
                        $this->ctrlCommentaire->commenter($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire);
                        break;

                    case 'administration': //interface privée
                        $this->ctrlAdministration->administration();
                        break;

                    case 'supprCommentaire'://pour supprimer un commentaire et ses enfants( sous-commentaires)
                        $id = $this->getParametre($_POST, 'id');
                        $this->ctrlCommentaire->delCommentaire($id);
                        break;

                    default:
                        throw new Exception("Action non valide");
                }
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch
            (Exception $e)
            {
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
        if (isset($tableau[$nom]))
        {
            return $tableau[$nom];
        }
        else  throw new Exception("Paramètre '$nom' absent");
    }
}