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

    // Route une requête entrante -> exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'episode': //pour affichage épisode
                        $idEpisode = intval($this->getParametre($_GET, 'id'));
                        if ($idEpisode != 0) {
                            $this->ctrlEpisode->episode($idEpisode);
                        } else throw new Exception("Identifiant de l'épisode non valide");
                        break;

                    case 'creerEpisode': //pour enregistrer un épisode
                        if (isset ($_POST['titre'])) {
                            $titre = $this->getParametre($_POST, 'titre');
                            $contenu = $this->getParametre($_POST, 'contenu');
                            $this->ctrlAdministration->creerEpisode($titre, $contenu);
                        } else {
                            $this->ctrlAdministration->creerEpisode();
                        }
                        break;

                    case 'modifEpisode': //pour modifier un épisode
                        $idEpisode = $this->getParametre($_GET, 'id');
                        if (isset ($_POST['titre'])) {
                            $titre = $this->getParametre($_POST, 'titre');
                            $contenu = $this->getParametre($_POST, 'contenu');
                            $this->ctrlAdministration->modifEpisode($idEpisode,$titre, $contenu);
                        }
                        else{
                            $this->ctrlAdministration->modifEpisode($idEpisode);
                        }
                        break;

                    case 'supprEpisode': //pour effacement épisode et commentaires afférants
                        $idEpisode = $this->getParametre($_GET, 'id');
                        if ($idEpisode != 0) {
                            $this->ctrlAdministration->supprEpisode($idEpisode);
                        } else throw new Exception("Identifiant de l'épisode non valide");
                        break;

                    case 'commenterEpisode': //pour commenter un épisode
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idEpisode = $this->getParametre($_POST, 'id');

                        $this->ctrlCommentaire->commenter($auteur, $contenu, $idEpisode);
                        break;

                    case 'commenterCommentaire': //pour commenter un commentaire (le commentaire initial, celui de l'épisode, à le rang 0)
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idEpisode = $this->getParametre($_POST, 'id_episode');
                        $parentCommentaire = $this->getParametre($_POST, 'parent');
                        $this->ctrlCommentaire->commenter($auteur, $contenu, $idEpisode, $parentCommentaire);
                        break;

                    case 'signalerAbusif': // pour signaler un commentaire abusif
                        $idCommentaire = $this->getParametre($_POST, 'id');
                        $idEpisode = $this->getParametre($_POST, 'id_episode');
                        $this->ctrlCommentaire->signalerAbusif($idEpisode, $idCommentaire);
                        break;

                    case 'administration': //interface privée
                        $this->ctrlAdministration->administration();
                        break;

                    case 'supprCommentaire'://pour supprimer un commentaire et ses enfants( sous-commentaires)
                        $id = $this->getParametre($_POST, 'id_del[]');
                        $this->ctrlAdministration->delCommentaire($id);
                        break;

                    case 'affichAbusif': // pour afficher la liste des commentaires abusifs

                        $this->ctrlCommentaire->affichAbusif();
                        break;

                    case 'gestionEpisode': //gère l'affichage des épisodes en mode administration 
                        $this->ctrlAdministration->adminEpisode();
                        break;

                    case 'connexion':
                        $admin = $this->getParametre($_POST, 'admin');
                        $pwd = $this->getParametre($_POST, 'pwd');
                        $this->ctrlAdministration->connectAdmin($admin, $pwd);
                        break;

                    default:
                        throw new Exception("Action non valide");
                }
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch
        (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur

    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else  throw new Exception("Paramètre '$nom' absent");
    }

    // Recherche un paramètre dans un tableau

    public function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}