<?php
    $userID = $_GET['id'];
    $lastName = $_POST['lastname'];
    $firstName = $_POST['firstname'];
    $birth = $_POST['birthDate'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    include("../../include/sql_connect.php");
    $sql = "UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, adresse = ?, cp = ?, ville = ?, phone = ?, mail= ? WHERE id='$userID'";
    $result = $bdd->prepare($sql);
    $result->execute(array(
        $lastName,
        $firstName,
        $birth,
        $adresse,
        $cp,
        $ville,
        $tel,
        $mail
    ));
header("Location: ../profil-patient.php?id=$userID&message=La patient a bien été modifié.");