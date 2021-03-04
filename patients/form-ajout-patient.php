<?php 
include("../include/header.php");
?>
<div class="container">
    <div class="row">
        <h1>Inscription patient</h1>
        <h3>Consulter les patients inscrit <a href="list-patients.php">ICI</a></h3>
        <form class="formSize" action="traitement/traitement-crea-patient.php" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group inputForm">
                        <label for="name">Nom :</label> <br>
                        <input class="form-control" type="text" id="lastname" name="nom" size="30" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="prenom">Prénom :</label> <br>
                        <input class="form-control" type="text" id="firstname" name="prenom" size="30" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="birth">Date de naissance :</label> <br>
                        <input class="form-control" type="date" id="birthDate" name="birthDate" size="8" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="adresse">Adresse :</label> <br>
                        <input class="form-control" id="adresse" name="adresse" size="100" required > <br>
                    </div>       
                    <div class="form-group inputForm">
                        <label for="cp">CP :</label> <br>
                        <input class="form-control" id="cp" name="cp" size="5" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="ville">Ville :</label> <br>
                        <input class="form-control" id="ville" name="ville" size="30" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="tel">Tel :</label> <br>
                        <input class="form-control" id="tel" name="tel" size="10" required > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="mdp"> Mot de passe :</label> <br>
                        <input class="form-control" id="mdp" type="password" name="mdp" size="30" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" > <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="mdr_conf"> Confirmation du mot de passe :</label> <br>
                        <input class="form-control" id="mdp_conf" type="password" name="mdp_conf" size="30" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, 1 chiffre, 1 lettre en majuscule et en minuscule" > <br> <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="mail"> E-mail :</label>   
                        <input class="form-control" type="email" id="mail" name="mail" size="50" required > <br> <br>
                    </div>
                    <div class="form-group inputForm">
                        <label for="mon_fichier"> Votre photo (JPEG ou PNG | max. 1 Mo) </label> <br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" >
                        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg" required> <br>
                    </div>
                    <div class="form-group inputForm">
                        <button class="btn btn-primary inputForm text-center" type="submit">Valider</button>
                    </div>
                </div>
            </div>
        </form>
        <a href="../index.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
    </div>
</div>
<?php
include("../include/footer.php");