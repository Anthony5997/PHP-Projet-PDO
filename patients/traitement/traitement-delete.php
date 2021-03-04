<?php
require_once("../../include/sql_connect.php");
$userID = $_GET['id'];
$delRdv = $bdd->prepare('DELETE FROM appointments
                        WHERE idPatients=?');
$delRdv->execute(array($userID));

$delPatient = $bdd->prepare('DELETE FROM patients
                        WHERE id=?');
$delPatient->execute(array($userID));
header("Location: ../list-patients.php?message=Le patient a été supprimé.");