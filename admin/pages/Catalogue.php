<hgroup>
    <h3 class="aligner txtGras">Catalogue des Medicaments</h3>
    <h4 class="text-muted aligner">Medicaments</h4>
</hgroup>
<?php

//récupération des films
$vue = new MedicmentDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getMedicament();
$nbr = count($liste);
?>

<div class="row">
    <div class="col-sm-12">
        <a href="./pages/printCatalogue.php" class="pull-right" target="_blank">Imprimer</a>
    </div>
</div>

<br/>

<h2 id="titre">Illustration d'un tableau dynamique</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Nom Medicament</th>
            <th class="ecart">Annee</th>
            <th class="ecart">Concentration</th>
			<th class="ecart">prix</th>
            <th class="ecart">Stocks</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_medicament']; ?></td>
              
                <td><span contenteditable="true" name="titre" class="ecart" id="<?php print $liste[$i]['id_medicament']; ?>">
                        <?php print $liste[$i]['nom_medicament']; ?></span>
                </td>
                <td><span contenteditable="true" name="annee" class="ecart" id="<?php print $liste[$i]['id_medicament']; ?>">
                        <?php print $liste[$i]['annee']; ?></span>
                </td>
                <td><span contenteditable="true" name="concentration" class="ecart" id="<?php print $liste[$i]['id_medicament']; ?>">
                        <?php print $liste[$i]['concentration']; ?></span>
                </td>
				<td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['id_medicament']; ?>">
                        <?php print $liste[$i]['prix']; ?></span>
                </td>
                <td><span contenteditable="true" name="stock" class="ecart" id="<?php print $liste[$i]['id_medicament']; ?>">
                        <?php print $liste[$i]['stock']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>