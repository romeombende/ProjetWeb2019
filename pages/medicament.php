<hgroup>
    <h3 class="aligner txtGras">Catalogue de Medicaments</h3>
    <h4 class="text-muted aligner">Medicaments disponibles..</h4>
</hgroup>

<?php
//récupération des types pour la liste déroulante
$genre = new GenreDB($cnx);
$genres = $genre->getGenre();
$nbr_genre = count($genres);

//récupération des produits
$vue = new Vue_medicament_genreDB($cnx);

$liste = array();
$liste = null;
//sans filtre de produits
if (!isset($_GET['submit_choix_type'])) {
    $liste = $vue->getAllMedicament();
}
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $vue->getMedicamentByGenre($_GET['choix_type']);
    } else {
        $liste = $vue->getAllMedicament();
    }
}
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">  
            <div class="col-sm-1 hidden-sm txtGras text-right">Filtrer</div>               
            <div class="col-sm-11">
                <select name="choix_type" id="choix_type">
                    <option value="">Genre</option>
                    <?php
                    for ($i = 0; $i < $nbr_genre; $i++) {
                        ?>
                        <option value="<?php print $genres[$i]->ref; ?>">
                            <?php
                            print $genres[$i]->libelle;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" name="submit_choix_type" id="submit_choix_type">
            </div>
        </div>
    </form>
</div>


<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <div class="row">
                <div class="col-sm-3 offset-1 demiContour text-center">
                    <img src="admin/images/<?php print $liste[$i]['image']; ?>" alt="Photo"/><br/><br/>
                </div>
                <div class="col-sm-5 text-center borderBottom">
                    <?php
                    print "<br/>" . $liste[$i]['nom_medicament'] . "<br/><br/>";
                    //print $liste[$i]['histoire'] . "<br/><br/>";
                    print $liste[$i]['prix'] . " €<br/><br/>";
                    if ($liste[$i]['stock'] > 0) {
                        print "Il reste " . $liste[$i]['stock'] . " exemplaire";
                        if ($liste[$i]['stock'] > 1) {
                            print "s";
                        }
                        print " en stock<br/> ";
                    }
                    ?>
					<p>
					  <br/>
					  <a href="index.php?page=client.php&id_medicament=<?php print $liste[$i]['id_medicament'];?> " > 
						Acheter
					  </a>
					</p>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}//fin if $nbr >0
else {
    ?>
    <div class="container">
        <p>( OUPS contenu indisponible ... )</p>
    </div>
    <?php
}
