<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$birth = $_POST['birthDate'];
$adresse = $_POST['adresse'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$tel = $_POST['tel'];
$mdp = $_POST['mdp'];
$mdpconfirm = $_POST['mdp_conf'];
$mail = $_POST['mail'];
$photo = $_POST['photo'];
$salt = "gHk45=)-('$^ùmm";
$mdp_crypte = sha1(sha1($mdp).$salt);

include("../../include/sql_connect.php");

$result = $bdd->prepare('SELECT mail FROM patients WHERE mail= :mail');
$result->bindValue(':mail', $mail, PDO::PARAM_STR);
$result->execute();

$tab_mail = array();
while($data=$result->fetch()){
    $tab_mail[]=$data['mail'];
}
$number=$result->rowCount();
$mailbdd=0;
for($i=0; $i<$number; $i++){
        $mailbdd=$tab_mail[$i];
} 
    if(strtolower($mail) == strtolower($mailbdd)){
        echo"<div>
                Oups, cette adresse e-mail est déjà utilisée.
            </div>";
        echo '<meta http-equiv="refresh" content= "2; URL=index.php">';
    }elseif($_POST['mdp'] != $_POST['mdp_conf']){
        echo"<div>
                Oups, les deux mots de passe ne sont pas identiques.
            </div>";
        echo'<meta http-equiv="refresh" content= "2; URL=index.php">';
    }else{
        $result = $bdd->prepare('INSERT INTO patients(
            lastname, firstname, birthdate, adresse, cp, ville, phone, mail, pwd, photo)
        VALUES(
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $result->execute(array($nom, $prenom, $birth, $adresse, $cp, $ville, $tel, $mail, $mdp_crypte, $photo));
        $result->closeCursor();
        echo '<meta http-equiv="refresh" content= "0; URL=../list-patients.php?message=Nouveau patient créé">';

};