<hgroup>
    <h3 class="aligner txtGras">Catalogue des Medicaments</h3>
    <h4 class="text-muted aligner">Commande</h4>
</hgroup>

<?php
if (isset($_GET['commander'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($email1) || empty($email2) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($numero) || empty($codepostal) || empty($localite)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new ClientDB($cnx);
        //$retour = $cl->addClient($_GET);
        $retour = $cl->addClient($_GET);
        if ($retour == 1) {
           // $commande = new CommandeDAO($cnx);
           // $ret = $commande->AjoutCommande($_GET['id_medicament'],2);

            print "<br/ >Insertion effectuée!";
        } else if ($retour == 2) {
         //  $commande = new CommandeDAO($cnx);
         //  $ret = $commande->AjoutCommande($_GET['id_medicament'],2);

            print "Deja encodé!";
        }
        //var_dump($_GET);
    }
}

$ok = 0;

if (!isset($_GET['id_medicament'])) {
    print "<p><br/><span class='txtGras'>Pour commander, choisissez <a href='index.php?page=medicament.php'>ici</a> votre article</span></p>";
} else {
    print "<br/>Afficher ici le rappel du produit commandé<br/><br/>";
    ?>
    <div class="row">
        <div class="col-xs-4 col-sm-2">
            <img src="./admin/images/dafalgan.jpg" alt="Votre commande"/> [cette image doit être dynamique]
        </div>
        <div class="col-xs-8 pull-left">
            <br/><span class="txtGras">Votre commande : <span class="txtRouge">[nom et détails du produit commandé]</span></span><br/>
        </div>
    </div>
    <br/>
    <span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>

    <div class="container">

        <?php
        if (isset($erreur))
            print $erreur;
        ?>

        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
            <br/>
            <label for="email1">Email</label>                
            <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
            <br/>
            <label for="email2">Confirmez votre email</label>
            <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
            <br/>
            <label for="prenom">Mot de Passe</label>
            <input type="text" name="password" id="password" />
            <br/>
            <label for="nom">Nom</label>                
            <input type="text" name="nom" id="nom" />
            <br/>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" />
            <br/>

            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
            <br/>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" />
            <br/>
            <label for="numero">Numéro</label>                
            <input type="text" name="numero" id="numero" />
            <br/>
            <label for="codepostal">Code postal</label>                
            <input type="text" name="codepostal" id="codepostal" />
            <br/>
            <label for="localite">Localité</label>
            <br/>
            <input type="text" name="localite" id="localite" />
            <br/>
            <input type="hidden" name="id_commande" value="<?php print $_GET['id_medicament']; ?>"/>
            <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
            <input type="reset" id="reset" value="Annuler" class="pull-left"/>
        </form>
    </div>
    <?php
}
?>
