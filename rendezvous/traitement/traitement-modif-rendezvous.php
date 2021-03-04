<?php
    $userID = $_GET['id'];
    $newDate= $_POST['date'];
    $newTime= $_POST['time'];
    $newDateTime = $newDate . " " . $newTime;
    include("../../include/sql_connect.php");
    $sql = "UPDATE appointments SET dateHour = ? WHERE id='$userID'";
    $result = $bdd->prepare($sql);
    $result->execute(array(
        $newDateTime
    ));
header("Location: ../rendezvous.php?id=$userID&message=Rendez-vous bien modifié");