<?php
require ("Modele/Joueur.php");

class JoueurDAO {
    private $connexion; // Déclaration de la propriété ici

    public function __construct() {
        $bdd = new Connexion();
        $this->connexion = $bdd->getConnexion();
    }

    // Méthode d'insertion des données dans la table Joueur
    public function create(Joueur $joueur) {
        try {
            $sql = "INSERT INTO joueur (Nom, Prenom, DateNaissance) VALUES (?, ?, ?)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$joueur->getNom(), $joueur->getPrenom(), $joueur->getDateNaissance()]);
            return $this->connexion->lastInsertId();
        } catch(PDOException $e) {
            echo "Erreur lors de la création du joueur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de lecture des données dans la table Joueur suivant l'id choisi
    public function read($ID_joueur) {
        try {
            $sql = "SELECT * FROM joueur WHERE ID_joueur = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$ID_joueur]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur lors de la lecture du joueur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de Mise à Jour des données dans la table Joueur
    public function update(Joueur $joueur) {
        try {
            $sql = "UPDATE joueur SET Nom = ?, Prenom = ?, DateNaissance = ? WHERE ID_joueur = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$joueur->getNom(), $joueur->getPrenom(), $joueur->getDateNaissance(), $joueur->getIDJoueur()]);
        } catch(PDOException $e) {
            echo "Erreur lors de la mise à jour du joueur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de suppression des données dans la table Joueur
    public function delete($ID_joueur) {
        try {
            $sql = "DELETE FROM joueur WHERE ID_joueur = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$ID_joueur]);
        } catch(PDOException $e) {
            echo "Erreur lors de la suppression du joueur : " . $e->getMessage();
            return false;
        }
    }

         // Méthode pour récupérer toutes les équipes depuis la base de données
         public function findAll() {
            try {
                $sql = "SELECT * FROM joueur";
                $stmt = $this->connexion->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Erreur lors de la récupération des équipes : " . $e->getMessage();
                return false;
            }
        }
}
?>
