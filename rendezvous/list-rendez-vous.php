<?php
require_once("../include/header.php");
require_once("../include/sql_connect.php");
if(isset($_GET["message"])){
    echo '<div style="padding: 10px; width:25vw; background:green; color:#fff;">
        '. $_GET["message"] . '
        </div>';
}
echo '<a href="ajout-rendez-vous.php"><button class="btn btn-primary inputForm text-center">Prendre rendez-vous</button></a>';
$result = $bdd->prepare('SELECT appointments.*, patients.firstname, patients.lastname FROM `appointments` 
                        JOIN patients
                        ON patients.id = appointments.idPatients');
$result->execute();

$appointment = $result->fetchAll(PDO::FETCH_ASSOC);
foreach($appointment as $rdv){
    echo "<div class='container'>
            <div class='row'>
                <div class='card-info'>
                    <br>Rendez-vous: ". $rdv['dateHour']." 
                    <br>Avec ". $rdv['firstname']." ". $rdv['lastname'];
                    ?>
                    <a href="rendezvous.php?id=<?=$rdv['id']?>">Plus d'information</a>
                    <a href="traitement/traitement-delete.php?id=<?=$rdv['id']?>">Supprimer rendez-vous</a>

    <?php echo"</div>
            </div>
        </div>";
}
?>
    <a href="../index.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
<?php
    include("../include/footer.php");
?>