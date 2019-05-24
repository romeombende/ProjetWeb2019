<hgroup>
    <h3 class="aligner txtGras"></h3>
    <h4 class="text-muted aligner">Commandes</h4>
</hgroup>
<?php

//récupération des medicaments
$vue = new CommandDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getCommand();
$nbr = count($liste);
?>

<div class="row">
    <div class="col-sm-12">
        <a href="./pages/printCommande.php" class="pull-right" target="_blank">Imprimer</a>
    </div>
</div>

<br/>

<h2 id="titre"></h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Id Medicament</th>
            <th class="ecart">Id Client</th>
            <th class="ecart">Quantite</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_command']; ?></td>
              
                <td><span contenteditable="true" name="id_medicament" class="ecart" id="<?php print $liste[$i]['id_medicament']; ?>">
                        <?php print $liste[$i]['id_medicament']; ?></span>
                </td>
                <td><span contenteditable="true" name="id_client" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                        <?php print $liste[$i]['id_client']; ?></span>
                </td>
                <td><span contenteditable="true" name="quantite" class="ecart" id="<?php print $liste[$i]['quantite']; ?>">
                        <?php print $liste[$i]['quantite']; ?></span>
                </td>
				
            </tr>
            <?php
        }
        ?>
    </table>  
</div>