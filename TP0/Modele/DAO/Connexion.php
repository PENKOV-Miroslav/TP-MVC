<?php

class Connexion {

    // attributs privées de la connexion BDD
  private $host = "localhost";
  private $db_name = "tp0";
  private $username = "root";
  private $password = "root";
  public $connexion;

  //  méthode publique qui retourne une connexion PDO à la base de données,
  // on crée une connexion PDO à la base de données en utilisant les informations stockées dans les attributs privées
  public function getConnexion(){
    $this->connexion = null;

    try {
      $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //On définit également le mode d'erreur à PDO::ERRMODE_EXCEPTION, ce qui permet de capturer les exceptions PDO et de les gérer.
    } catch(PDOException $exception){  //Si une erreur se produit lors de la connexion à la base de données, on affiche un message d'erreur à l'utilisateur.
      echo "Erreur de connexion : " . $exception->getMessage();
    }

    return $this->connexion;
  }
}
