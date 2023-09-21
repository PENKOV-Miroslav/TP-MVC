<?php
require ("Modele/Equipe.php");

class EquipeDAO {
    private $connexion; // Déclaration de la propriété ici

    public function __construct() {
        $bdd = new Connexion();
        $this->connexion = $bdd->getConnexion();
    }

    // Méthode d'insertion des données dans la table Equipe
    public function create(Equipe $equipe) {
        try {
            $sql = "INSERT INTO equipe (Nom, President, ID_ligue) VALUES (?, ? ,?)";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$equipe->getNom(), $equipe->getPresident(), $equipe->getIDLigue()]);
            return $this->connexion->lastInsertId();
        } catch(PDOException $e) {
            echo "Erreur lors de la création de l'équipe : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de lecture des données dans la table Equipe suivant l'id choisi
    public function read($ID_equipe) {
        try {
            $sql = "SELECT * FROM equipe WHERE ID_equipe = ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$ID_equipe]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur lors de la lecture de l'équipe : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de Mise à Jour des données dans la table Equipe
    public function update(Equipe $equipe) {
        try {
            $sql = "UPDATE equipe SET Nom = ?, President = ? WHERE ID_equipe = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$equipe->getNom(), $equipe->getPresident(), $equipe->getIDEquipe()]);
        } catch(PDOException $e) {
            echo "Erreur lors de la mise à jour de l'équipe : " . $e->getMessage();
            return false;
        }
    }

    // Méthode de suppression des données dans la table Equipe
    public function delete($ID_equipe) {
        try {
            $sql = "DELETE FROM equipe WHERE ID_equipe = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$ID_equipe]);
        } catch(PDOException $e) {
            echo "Erreur lors de la suppression de l'équipe : " . $e->getMessage();
            return false;
        }
    }

     // Méthode pour récupérer toutes les équipes depuis la base de données
     public function findAll() {
        try {
            $sql = "SELECT * FROM equipe";
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
