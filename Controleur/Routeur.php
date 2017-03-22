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
<<<<<<< HEAD
                switch ($_GET['action']) {
=======
                switch ($_GET(['action'])) {
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
                    case 'episode': //pour affichage épisode
                        $idEpisode = intval($this->getParametre($_GET, 'id'));
                        if ($idEpisode != 0) {
                            $this->ctrlEpisode->episode($idEpisode);
                        } else throw new Exception("Identifiant de l'épisode non valide");
                        break;

<<<<<<< HEAD
                    case 'creerEpisode': //pour enregistrer un épisode
=======
                    case 'recEpisode': //pour enregistrer un épisode
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
                        if (isset ($_POST['titre'])) {
                            $titre = $this->getParametre($_POST, 'titre');
                            $contenu = $this->getParametre($_POST, 'contenu');
                            $this->ctrlAdministration->recEpisode($titre, $contenu);
                        } else {
                            $this->ctrlAdministration->recEpisode();
                        }
                        break;

<<<<<<< HEAD
                    case 'modifEpisode': //pour modifier un épisode
=======
                    case 'modEpisode': //pour modifier un épisode
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
                        $id = $this->getParametre($_POST, 'id');
                        $this->ctrlAdministration->modEpisode($id);
                        break;

                    case 'supprEpisode': //pour effacement épisode et commentaires afférants
                        $id = $this->getParametre($_POST, 'id');
                        $this->ctrlAdministration->delEpisode($id);
                        break;

<<<<<<< HEAD
                    case 'commenterEpisode': //pour commenter un épisode
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idEpisode = $this->getParametre($_POST, 'id');
                        $this->ctrlCommentaire->commenter($auteur, $contenu, $idEpisode);
                        break;

                    case 'commenterCommentaire': //pour commenter un commentaire (le commentaire initial, celui de l'épisode à le rang 0)
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $rangCommentaire = $this->getParametre($_POST, 'rang'); // 0=initial(de l'épisode) / 1=commentaire du commentaire 0 / 2=du commentaire de rang 1/ 3=du commentaire de rang 2
                        $parentCommentaire = $this->getParametre($_POST, 'parent');//id du commentaire de rang 0
                        $this->ctrlCommentaire->commenter($auteur, $contenu, $rangCommentaire, $parentCommentaire);
                        break;

                    case 'signalerAbusif': // pour signaler un commentaire abusif
                        $id = $this->getParametre($_POST,'id');
                        $this->ctrlCommentaire->signCommentaireAbusif($id);
=======
                    case 'commenter': //pour commenter un épisode ou un commentaire
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idEpisode = $this->getParametre($_POST, 'id');
                        $rangCommentaire = $this->getParametre($_POST, 'rang');
                        $parentCommentaire = $this->getParametre($_POST, 'parent');
                        $this->ctrlCommentaire->commenter($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire);
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
                        break;

                    case 'administration': //interface privée
                        $this->ctrlAdministration->administration();
                        break;

                    case 'supprCommentaire'://pour supprimer un commentaire et ses enfants( sous-commentaires)
                        $id = $this->getParametre($_POST, 'id');
<<<<<<< HEAD
                        $this->ctrlAdministration->delCommentaire($id);
                        break;
                        
                    case 'affichAbusif': // pour afficher la liste des commentaires abusifs
                        $id = $this->getParametre($_POST,'id');
                        $this->ctrlCommentaire->dispCommentairesAbusifs($id);
                        
                    case 'gestionEpisode': //gère l'affichage des épisodes en mode administration 
                        $this->ctrlAdministration->adminEpisode();
=======
                        $this->ctrlCommentaire->delCommentaire($id);
>>>>>>> 77f8cc349b68da912e622bd605b8687debbb702a
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