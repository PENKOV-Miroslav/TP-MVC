<?php
require ("Modele/Membre.php");

class MembreDAO {
    private $connexion;

    public function __construct() {
        $bdd = new Connexion();
        $this->connexion = $bdd->getConnexion();
    }

    // Méthode d'insertion des données dans la table Membre
    public function create(Membre $membre) {
        try {
            $sql = "INSERT INTO membre (ID_joueur, ID_equipe) VALUES (?, ?)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$membre->getIDJoueur(), $membre->getIDEquipe()]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la création du membre : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de lecture des données dans la table Membre suivant l'ID du joueur
    public function readByJoueurID($ID_joueur) {
        try {
            $sql = "SELECT * FROM membre WHERE ID_joueur = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$ID_joueur]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture des membres : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de lecture des données dans la table Membre suivant l'ID de l'équipe
    public function readByEquipeID($ID_equipe) {
        try {
            $sql = "SELECT * FROM membre WHERE ID_equipe = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$ID_equipe]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la lecture des membres : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de suppression des données dans la table Membre
    public function delete($ID_joueur, $ID_equipe) {
        try {
            $sql = "DELETE FROM membre WHERE ID_joueur = ? AND ID_equipe = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$ID_joueur, $ID_equipe]);
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du membre : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour récupérer toutes les équipes depuis la base de données
    public function findAll() {
        try {
            $sql = "SELECT * FROM membre";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur lors de la récupération des équipes : " . $e->getMessage();
            return false;
        }
    }
}
