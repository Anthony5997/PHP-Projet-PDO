<?php
//connexion à la base de données

$serveur = "127.0.0.1:3306";
$pseudo = "root";
$pass = "";
$bdd = "hospitalE2N";


try
{
    $bdd = new PDO('mysql:host=127.0.0.1:3306;dbname=hospitalE2N','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exeption $e)
{
    die('Erreur : ' .$e->getMessage())  or die(print_r($bdd->errorInfo()));
}
