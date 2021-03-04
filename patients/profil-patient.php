<?php 
require_once("../include/sql_connect.php");
include("../include/header.php");
$userID = $_GET['id'];
if(isset($_GET["message"])){
    echo '<div style="padding: 10px; width:25vw; background:green; color:#fff;">
        '. $_GET["message"] . '
        </div>';
}
$qRdv = $bdd->query("SELECT * FROM patients, appointments WHERE appointments.idPatients = patients.id");
$result = $bdd->query('SELECT firstname, lastname, birthdate, adresse, cp, ville, phone, mail, photo FROM patients WHERE id = "'.$userID.'"');
    
$qRdv = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($qRdv as $patient){
    echo "<div class='container'>
            <div class='row'>
                <div class='card-info'>
                    <br>Nom: ". $patient['lastname'] .
                    "<br>Prénom: ". $patient['firstname'] . 
                    "<br>Date de naissance: ". $patient['birthdate'] .
                    "<br>Adresse: ". $patient['adresse'] . 
                    "<br>Code Postal: ". $patient['cp'] .
                    "<br>Ville : ". $patient['ville'] .
                    "<br>Téléphone: ". $patient['phone'] .
                    "<br>Email: ". $patient['mail'].
                    "<br><img class='img-profil' src="."../images/".$patient['photo']."></br>";
                    if(!empty($patient['dateHour'])){
                        echo "Prochain rendez-vous: " . $patient['dateHour'];
                    }else{
                        echo "Pas de rendez-vous prevu pour l'instant";
                    }
          echo  '</div>
            </div>
        </div>
        <div class="form-group inputForm">';
}
?>
        <a href="form-modif-patient.php?id=<?=$userID?>"><button class="btn btn-primary inputForm text-center">Modifier les informations</button></a>
        </div>
    <a href="list-patients.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
<?php
include("../include/footer.php");
?>