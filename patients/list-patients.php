<?php
require_once("../include/header.php");
require_once("../include/sql_connect.php");
if(isset($_GET["message"])){
    echo '<div style="padding: 10px; width:25vw; background:green; color:#fff;">
        '.$_GET["message"].'
         </div>';
}
echo '<a href="form-ajout-patient.php"><button class="btn btn-primary inputForm text-center">S\'inscrire</button></a>';

echo '
    <form class="formSize" method="post" action="list-patients.php">
        <div class="form-group inputForm">
            <label>Rechercher un patient</label></br>
            <input type="text" name="searchBar" id="searchBar">
            <input class="btn btn-primary inputForm text-center" type="submit" value="Rechercher">
        </div>

    </form>';

    if(isset($_POST['searchBar'])){
        $search = $_POST['searchBar'].'%';
        $query = $bdd->prepare("SELECT *
        FROM patients 
        WHERE firstname 
            LIKE ?
                OR lastname 
                    LIKE ?");
        $query->execute(array(
            $search,
            $search
        ));
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        echo "<div class='container'>
        <div class='row'>
            <div class='card-info'>
                <br>Nom: ". $result['lastname'] .
                "<br>Prénom: ". $result['firstname']. 
                "<br><img class='img-profil' src="."../images/".$result['photo'].">";
                ?>
                <br>
                <a href="profil-patient.php?id=<?=$result['id']?>">Voir Profil</a><br>
                <a href="traitement/traitement-delete.php?id=<?=$result['id']?>">Supprimer le profil du patient</a>
<?php echo"</div>
        </div>
    </div>";
    }else{
        /*******************PAGINATION**********************/
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
        }else{
            $currentPage = 1;
        }
    $pagination = $bdd->prepare("SELECT COUNT(*) AS id FROM patients");
    $pagination->execute();
    $resultCount = $pagination->fetch(PDO::FETCH_ASSOC);
    $nbrPage = (int)$resultCount['id'];

    $parPage = 2;
    $pages = ceil($nbrPage / $parPage);
    $premier = ($currentPage * $parPage) - $parPage;
    $sql = 'SELECT * FROM `patients` ORDER BY `lastname` DESC LIMIT :premier, :parpage;';
    $qPagination = $bdd->prepare($sql);
    $qPagination->bindValue(':premier', $premier, PDO::PARAM_INT);
    $qPagination->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $qPagination->execute();

    $users = $qPagination->fetchAll(PDO::FETCH_ASSOC);
    /********************PAGINATION***************************/
    foreach($users as $patient){
        echo "<div class='container'>
                <div class='row'>
                    <div class='card-info'>
                        <br>Nom: ". $patient['lastname'] .
                        "<br>Prénom: ". $patient['firstname']. 
                        "<br><img class='img-profil' src="."../images/".$patient['photo'].">";
                        ?>
                        <br>
                        <a href="profil-patient.php?id=<?=$patient['id']?>">Voir Profil</a><br>
                        <a href="traitement/traitement-delete.php?id=<?=$patient['id']?>">Supprimer le profil du patient</a>
        <?php echo"</div>
                </div>
            </div>";
    }
        ?>
<nav>
    <ul class="pagination">
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="list-patients.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="list-patients.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="list-patients.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
<?php } ?>
    <a href="../index.php"><button class="btn btn-primary inputForm text-center">Retour</button></a>
<?php
    include("../include/footer.php");
    ?>