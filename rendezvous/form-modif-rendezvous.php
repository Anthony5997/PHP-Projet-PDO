<?php
include('../include/header.php');
include('../include/sql_connect.php');
$userID = $_GET['id'];
$result = $bdd->query("SELECT * FROM `appointments` WHERE id=$userID");
$users = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $rdv){
    $newRdv = $rdv['dateHour'];
   }


// On affiche un formulaire pré-rempli avec les informations déjà entrées dans la BDD
echo '<h1>Voici vos informations :</h1>';
echo '<h2>Vous pouvez les modifier !</h2>';
echo '</br>';
echo '</br>';
?>
<form class="formSize" method="post" action="traitement/traitement-modif-rendezvous.php?id=<?=$userID?>">
  <?php
  echo ' 
        <div class="form-group inputForm">
                <label for="date">Prenez un nouveau rendez-vous :</label> <br>
                    <input type="date" id="date" name="date" required>
                    <input type="time" id="time" name="time" required> <br>
        </div>';
        ?>
        <?php

  echo '<div class="form-group inputForm">
            <button class="btn btn-primary inputForm text-center" type="submit">Modifier</button>
        </div>
</form>';
    echo '</br>';
        ?>
        <div class="form-group inputForm">
        <a href="rendezvous.php?id=<?=$userID?>"><button class="btn btn-primary inputForm text-center">Retour</button></a>
        </div>

