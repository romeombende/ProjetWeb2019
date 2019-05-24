<hgroup>
    <h3 class="aligner txtGras">Catalogue des Medicaments</h3>
    <h4 class="text-muted aligner">Commande</h4>
</hgroup>

<?php
//$id_medicament = $_GET['id_medicament'];
if (isset($_GET['commander'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($email1) || empty($email2) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($numero) || empty($codepostal) || empty($localite)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new ClientDB($cnx);
        $cd = new CommandDB($cnx);
        $data = $cl->getClientAll($_GET['email1'], $_GET['password']);
        $retour = $cl->addClient($_GET);
        $id_medicament= $_GET['id_medicament'];
      //  echo $_GET['id_medicament'];
      //  echo $data[0]['id_client'];
        $cd->addCommand($data[0]['id_client'],$id_medicament);
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
    print "<br/><br/><br/>";
    ?>
    <div class="row">
        <div class="col-xs-4 col-sm-2">
            <!--<img src="./admin/images/dafalgan.jpg" alt="Votre commande"/> 
            <img src="admin/images/" alt="Photo"/><br/><br/>-->
        </div>
        <div class="col-xs-8 pull-left">
            <br/><span class="txtGras"> <span class="txtRouge"></span></span><br/>

        </div>
    </div>
    <br/>
    <legend>
        <span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>
    </legend>

    <div class="container">

        <?php
        if (isset($erreur))
            print $erreur;
        ?>
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
            <fieldset>
                <br/>
                <label for="email1">Email <em>*</em></label>                
                <input type="email" id="email1" name="email1" placeholder="prenom.nom@condorcet.be" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@condorcet.be"/>
                <br/>
                <label for="email2">Confirmez votre email <em>*</em></label>
                <input type="email" id="email2" name="email2" placeholder="prenom.nom@condorcet.be" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@condorcet.be"/>
                <br/>
                <label for="prenom">Mot de Passe</label>
                <input type="text" name="password" id="password" />
                <br/>
                <label for="nom">Nom <em>*</em></label>                
                <input type="text" name="nom" id="nom" />
                <br/>
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" />
                <br/>

                <label for="telephone">Téléphone <em>*</em></label>
                <input type="text" name="telephone" id="telephone" placeholder="06xxxxxxxx" pattern="06[0-9]{8}"/>
                <br/>
                <label for="adresse">Adresse <em>*</em></label>
                <input type="text" name="adresse" id="adresse" />
                <br/>
                <label for="numero">Numéro</label>                
                <input type="text" name="numero" id="numero" />
                <br/>
                <label for="codepostal">Code postal</label>                
                <input type="text" name="codepostal" id="codepostal" />
                <br/>
                <label for="localite">Localité</label>  
                <input type="text" name="localite" id="localite" />
                <br/>
                <label for="id_medicament">ID MEDICAMENT</label>  
                <input type="text" name="id_medicament" id="id_medicament" value="<?php echo $_GET['id_medicament']; ?>" />
                <br/>


                <br/>
            </fieldset>

         <!--   <input type="hidden" name="id_commande" value="<?php print $_GET['id_medicament']; ?>"/> -->
            <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
            <input type="reset" id="reset" value="Annuler" class="pull-left"/>

        </form>
    </div>
    <?php
}
?>
