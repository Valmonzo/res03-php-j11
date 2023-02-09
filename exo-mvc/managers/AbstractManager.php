<?php

/*AbstractManager
Créez une classe abstraite AbstractManager, qui contient un attribut protected :

$db qui est un PDO
et 5 attributs privés :

$dbName : string
$port : string
$host : string
$username : string
$password : string
Le constructeur reçoit les attributs privés en paramètres et les initialise puis il initialise l'attribut protected en créant la connexion à la base de données. */

abstract class AbstractManager {
    protected  PDO $db;
    protected  string $dbName;
    protected  string $port;
    protected  string $host;
    protected  string $username;
    protected  string $password;


    private function initDb() : PDO
    {
        $this->db = new PDO
        (
            "mysql:host=$host;port=$port;dbname=$dbname",
            $username,
            $password
        );
    }
}

?>

