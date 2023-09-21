<?php
require ("Modele/Ligue.php");

class LigueDAO {
    private $connexion; // Déclaration de la propriété ici

    public function __construct() {  
        $bdd = new Connexion();
        $this->connexion = $bdd->getConnexion();
    }

    // Méthode d'insertion des données dans la table Ligue
    public function create(Ligue $ligue) {
        try {
            $sql = "INSERT INTO ligue (Region) VALUES (?)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$ligue->getRegion()]);
            return $this->connexion->lastInsertId();
        } catch(PDOException $e) {
            echo "Erreur lors de la création de la ligue : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de lecture des données dans la table Ligue suivant l'id choisi
    public function read($ID_ligue) {
        try {
            $sql = "SELECT * FROM ligue WHERE ID_ligue = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$ID_ligue]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur lors de la lecture de la ligue : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de Mise à Jour des données dans la table Ligue
    public function update(Ligue $ligue) {
        try {
            $sql = "UPDATE ligue SET Region = ? WHERE ID_ligue = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$ligue->getRegion(), $ligue->getIDLigue()]);
        } catch(PDOException $e) {
            echo "Erreur lors de la mise à jour de la ligue : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de suppression des données dans la table Ligue
    public function delete($ID_ligue) {
        try {
            $sql = "DELETE FROM ligue WHERE ID_ligue = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$ID_ligue]);
        } catch(PDOException $e) {
            echo "Erreur lors de la suppression de la ligue : " . $e->getMessage();
            return false;
        }
    }

         // Méthode pour récupérer toutes les ligues depuis la base de données
         public function findAll() {
            try {
                $sql = "SELECT * FROM ligue";
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
