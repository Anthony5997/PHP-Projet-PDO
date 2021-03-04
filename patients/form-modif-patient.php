<?php
include('../include/header.php');
include('../include/sql_connect.php');
$userID = $_GET['id'];
$result = $bdd->query("SELECT firstname, lastname, birthdate, adresse, cp, ville, phone, mail, photo FROM patients WHERE id=$userID");
$users = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
    $firstName = $user['firstname'];
    $lastName = $user['lastname'];
    $birth = $user['birthdate'];
    $adresse = $user['adresse'];
    $cp = $user['cp'];
    $ville = $user['ville'];
    $phone = $user['phone'];
    $mail = $user['mail'];
    $photo = $user['photo'];
   }
   var_dump($userID);

// On affiche un formulaire pré-rempli avec les informations déjà entrées dans la BDD
echo '<h1>Voici vos informations :</h1>';
echo '<h2>Vous pouvez les modifier !</h2>';
echo '</br>';
echo '</br>';
?>
<form class="formSize" method="post" action="traitement/traitement-modif-patient.php?id=<?=$userID?>">
  <?php
  echo ' 
        <div class="form-group inputForm">
                <label for="firstname">Prénom :</label> <br>
                <input class="form-control" type="text" id="firstname" name="firstname" value="'.$firstName.'" size="30" required > <br>
        </div>
        
        <div class="form-group inputForm">
                <label for="lastname">Nom :</label> <br>
                <input class="form-control" type="text" id="lastname" name="lastname" value="'.$lastName.'" size="30" required > <br>
        </div>
        <div class="form-group inputForm">
                <label for="birth">Date de naissance :</label> <br>
                <input class="form-control" type="date" id="birthDate" name="birthDate" value="'.$birth.'" size="10" required > <br>
        </div>
        <div class="form-group inputForm">
            <label for="adresse">Adresse :</label> <br>
            <input class="form-control" type="text" id="adresse" name="adresse" value="'.$adresse.'" size="50" required > <br>
        </div>
        <div class="form-group inputForm">
            <label for="ville">Ville :</label> <br>
            <input class="form-control" type="text" id="ville" name="ville" value="'.$ville.'" size="30" required > <br>
        </div>
        <div class="form-group inputForm">
        <label for="cp">Code Postal :</label> <br>
        <input class="form-control" type="text" id="cp" name="cp" value="'.$cp.'" size="30" required > <br>
        </div>
        <div class="form-group inputForm">
            <label for="tel">Téléphone :</label> <br>
            <input class="form-control" type="number" id="tel" name="tel" value="'.$phone.'" size="10" required > <br>
        </div>
        <div class="form-group inputForm">
            <label for="mail">Mail :</label> <br>
            <input class="form-control" type="mail" id="mail" name="mail" value="'.$mail.'" size="10" required > <br>
        </div>';
        ?>
        <?php /*<div class="form-group inputForm">
                <label for="mon_fichier"> Votre photo (JPEG ou PNG | max. 1 Mo) </label> <br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" >
                <input type="file" id="photo" name="photo" value="'.$photo.'" accept="image/png, image/jpeg" required> <br>
                </div> */
            ?>
        <?php

  echo '<div class="form-group inputForm">
            <button class="btn btn-primary inputForm text-center" type="submit">Modifier</button>
        </div>
</form>';
    echo '</br>';
        ?>
        <div class="form-group inputForm">
        <a href="profil-patient.php?id=<?=$userID?>"><button class="btn btn-primary inputForm text-center">Retour</button></a>
        </div>
<?php 
  include('../include/footer.php');
?>
