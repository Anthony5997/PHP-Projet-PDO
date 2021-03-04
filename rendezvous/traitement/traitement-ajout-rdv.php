<?php
$date= $_POST["date"];
$time= $_POST["time"];
$dateTime= $date. " " .$time;
$patient= $_POST["idPatient"];
include("../../include/sql_connect.php");
$result = $bdd->prepare('INSERT INTO appointments(
    dateHour, idPatients)
VALUES(
    ?, ?)');
$result->execute(array($dateTime, $patient));
$result->closeCursor();
header("Location: ../list-rendez-vous.php?message=Votre rendez-vous a bien été créé.");
