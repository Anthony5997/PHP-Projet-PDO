<?php 
include("../include/header.php");
include("../include/sql_connect.php");
$result = $bdd->prepare('SELECT id, firstname, lastname FROM patients');
$result->execute();
$users = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="row">
        <h1>Inscription patient</h1>
        <h3>Consulter les patients inscrit <a href="../patients/list-patients.php">ICI</a></h3>
        <form class="formSize" action="traitement/traitement-ajout-rdv.php" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group inputForm">
                        <label for="rdv">Rendez-vous: </label> <br>
                        <input type="date" id="date" name="date" required>
                        <input type="time" id="time" name="time" required> <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="prenom">Patient :</label> <br>
                        <select name="idPatient" id="idPatient">
                        <?php foreach($users as $patient){?>
                          <option value="<?=$patient['id']?>"><?=$patient['lastname'].' '.$patient['firstname']?></option>
                        <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group inputForm">
                         <button class="btn btn-primary inputForm text-center" type="submit">Valider</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<a href="../index.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
<?php
include("../include/footer.php");