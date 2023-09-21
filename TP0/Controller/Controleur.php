<?php
require_once ('Vue/Vue.php');
require_once ('Modele/DAO/EquipeDAO.php');
require_once ('Modele/DAO/LigueDAO.php');
require_once ('Modele/DAO/JoueurDAO.php');
require_once ('Modele/DAO/MembreDAO.php'); 
require_once ('Modele/DAO/Connexion.php');


class Controleur {
    public function gererRequete() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'accueil';

        switch ($action) {
            case 'equipe_create':
                $this->creerEquipe();
                break;
            case 'equipe_liste':
                $this->listeEquipes();
                break;
            case 'ligue_create':
                $this->creerLigue();
                break;
            case 'ligue_liste':
                $this->listeLigues();
                break;
            case 'joueur_create':
                $this->creerJoueur();
                break;
            case 'joueur_liste':
                $this->listeJoueurs();
                break;
            case 'membre_create':
                $this->creerMembre();
                break;
            case 'membre_liste':
                $this->listeMembres();
                 break;
            default:
                $this->accueil();
        }
    }

    public function accueil() {
        afficherAccueil();
    }

    public function creerEquipe() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $equipeDAO = new EquipeDAO();
            $nom = $_POST['nom'];
            $president = $_POST['president'];
            $idligue = $_POST['idligue'];

            $equipe = new Equipe(null, $nom, $president,$idligue);
            $equipeDAO->create($equipe);
        }

        afficherFormulaireEquipe();
    }

    public function listeEquipes() {
        $equipeDAO = new EquipeDAO();
        $equipes = $equipeDAO->findAll();
        afficherListeEquipes($equipes);
    }

    public function creerLigue() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ligueDAO = new LigueDAO();
            $region = $_POST['region'];

            $ligue = new Ligue(null, $region);
            $ligueDAO->create($ligue);
        }

        afficherFormulaireLigue();
    }

    public function listeLigues() {
        $ligueDAO = new LigueDAO();
        $ligues = $ligueDAO->findAll();
        afficherListeLigues($ligues);
    }

    public function creerJoueur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $joueurDAO = new JoueurDAO();
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateNaissance = $_POST['date_naissance'];

            $joueur = new Joueur(null, $nom, $prenom, $dateNaissance);
            $joueurDAO->create($joueur);
        }

        afficherFormulaireJoueur();
    }

    public function listeJoueurs() {
        $joueurDAO = new JoueurDAO();
        $joueurs = $joueurDAO->findAll();
        afficherListeJoueurs($joueurs);
    }


    public function creerMembre() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $membreDAO = new MembreDAO();
            $id_joueur = $_POST['id_joueur'];
            $id_equipe = $_POST['id_equipe'];
    
            $membre = new Membre($id_joueur, $id_equipe);
            $membreDAO->create($membre);
        }
    
        afficherFormulaireMembre();
    }
    
    public function listeMembres() {
        $membreDAO = new MembreDAO();
        $membres = $membreDAO->findAll();
        afficherListeMembres($membres);
    }
    
}
?>
