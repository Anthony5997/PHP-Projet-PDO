<?php 
require_once("../include/sql_connect.php");
include("../include/header.php");
if(isset($_GET["message"])){
    echo '<div style="padding: 10px; width:25vw; background:green; color:#fff;">
        '. $_GET["message"] . '
        </div>';
}
$userID = $_GET['id'];
$result = $bdd->prepare(
    "SELECT appointments.*, patients.firstname, patients.lastname, patients.birthdate, patients.adresse, patients.cp, patients.ville, patients.phone, patients.mail, patients.photo FROM appointments
    JOIN patients
        ON patients.id = appointments.idPatients
    WHERE appointments.id=?");
$result->execute(array($userID));

$patient = $result->fetch(PDO::FETCH_ASSOC);


    echo "<div class='container'>
            <div class='row'>
                <div class='card-info'>
                    <br><b>Rendez vous: ".$patient['dateHour']. "</b>
                    <br>Nom: ". $patient['lastname'] .
                    "<br>Prénom: ". $patient['firstname'] . 
                    "<br>Date de naissance: ". $patient['birthdate'] .
                    "<br>Adresse: ". $patient['adresse'] . 
                    "<br>Code Postal: ". $patient['cp'] .
                    "<br>Ville : ". $patient['ville'] .
                    "<br>Téléphone: ". $patient['phone'] .
                    "<br>Email: ". $patient['mail'].
                    "<br><img class='img-profil' src="."../images/".$patient['photo'].">";
        echo  '</div>
            </div>
        </div>

    <div class="form-group inputForm">';
    
?>
    <a href="form-modif-rendezvous.php?id=<?=$userID?>"><button class="btn btn-primary inputForm text-center">Modifier le rendez-vous</button></a>
        </div>
    <a href="list-rendez-vous.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
<?php
include("../include/footer.php");
?>