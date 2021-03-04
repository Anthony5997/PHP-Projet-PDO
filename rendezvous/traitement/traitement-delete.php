<?php
require_once("../../include/sql_connect.php");
$userID = $_GET['id'];
$result = $bdd->prepare('DELETE FROM appointments
                        WHERE id=?');
$result->execute(array($userID));
$result->closeCursor();
header("Location: ../list-rendez-vous.php?message=Le rendez-vous a été supprimé.");