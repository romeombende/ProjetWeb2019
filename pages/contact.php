<link rel="stylesheet" type="text/css" href="../lib/css/style.css" />
<div class="saisie">
    <?php
if (isset($_GET['contacter'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($email1) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($numero) || empty($codepostal) || empty($localite)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new ContactDB($cnx);
        //$retour = $cl->addClient($_GET);
        $retour = $cl->addContact($_GET);
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


    ?>
    

<nav>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_contact">
        
<!--		   
		
		
		
			<table>
				<tr>
					<td><label for="nom">Nom : </label></td>
					<td><input type="text" name="nom" id="nom" placeholder="Nom" required /></td>
				</tr>
				<tr>
					<td><label for="prenom">Prénom : </label></td>
					<td><input type="text" name="prenom" id="prenom" placeholder="Prénom" required /></td>
				</tr>
				<tr>
					<td><label for="mobile">Mobile : </label></td>
					<td><input type="number_format" name="mobile" id="mobile" placeholder="mobile" required /></td>
				</tr>
				<tr>
					<td><label for="rue">Rue : </label></td>
					<td><input type="texte" name="rue" id="rue" placeholder="rue" required /></td>
				</tr>
				<tr>
					<td><label for="localite">Localite : </label></td>
					<td><input type="text" name="localite" id="localite" placeholder="localite" required /></td>
				</tr>
				<tr>
				    <td><label for="email">Email:</label></td> 
				    <td><input type="mail" name="email" required /></td>
			        </tr>
				<tr>
					<td><label for="message">Message : </label></td>
					<td><textarea name="message" id="message" cols="50" rows="10"  value="message" required ></textarea></td>
				</tr>
				<tr>
					<td><input type="reset" name="reset" value="annuler"></td>
				    <td><input type="submit" name="envoyer" value="envoyer"></td>>
				</tr>
			</table>
                    -->
                    <h2>Nous contacter</h2>

  
       <fieldset>
           <legend>Contact</legend>
           <label for="nom">Nom <em>*</em></label>
           <input id="nom" placeholder="Olivier Serre" autofocus="" required=""><br>
           <label for="telephone">Portable</label>
           <input id="telephone" type="tel" placeholder="06xxxxxxxx" pattern="06[0-9]{8}"><br>
           <label for="email">Email <em>*</em></label>
           <input id="email" type="email" placeholder="prenom.nom@polytechnique.edu" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu"><br>
       </fieldset>
       <fieldset>
           <legend>Information personnelles</legend>
           <label for="age">Age<em>*</em></label>
           <input id="age" type="number" placeholder="xx" pattern="[0-9]{2}" required=""><br>
           <label for="sexe">Sexe</label>
           <select id="sexe">
                 <option value="F" name="sexe">Femme</option>
                 <option value="H" name="sexe">Homme</option>
           </select><br>
           <label for="comment">Pourquoi vous nous contacter ?</label>
           <textarea id="comment"></textarea>
       </fieldset>
 
       <fieldset>
          <legend>Veuillez Choisir</legend>
          <label for="mecontentement"><input id="mecontent" type="checkbox" name="binet" value="mecontentement"> Mecontent</label>
          <label for="Appreciation"><input id="apprecier" type="checkbox" name="binet" value="appreciation"> Apprecier</label>
       </fieldset>
       <p>
       <input type="hidden" name="id_contact" value="<?php print $_GET['id_contact']; ?>"/>
            <input type="submit" name="contact" id="contacter" value="contacter" class="pull-right"/>&nbsp;           
            <input type="reset" id="reset" value="Annuler" class="pull-left"/>
       </p>
    </form>
    
		
		<h1>Qui sommes nous ?&nbsp</h1>
		<p> 
        
          <strong>Pharmaonline</strong> est le département Online de la Pharmacie,officine ouverte au public.<br/>

          Nous sommes ouvert du lundi au vendredi de 8h30 à 12h et de 13h30 à 19h. Ouvert le samedi de 9h à 12h. 
          Tél: +32 (0)71 88 54 00 et enregistrée sous le n° APB 952201 (TVA BE 0860.831.151).<br/>

          Nous sommes une équipe officinale de 5 personnes . 
          Notre pharmacie en ligne a été notifiée auprès de l’AFMPS (Agence Fédérale des Médicaments et des
          Produits de santé), chargée de garantir la légalité des pharmacies en ligne belges.<br/>

          En tant qu’officine belge, nous vous garantissons la provenance des médicaments et des produits
          para-pharmaceutiques vendus sur notre site. Tous ces produits répondent à la législation belge. 
          Les quantités livrables sont limitées à 5 produits identiques en parapharmacie et pour les médicaments.<br/>

          Tous les médicaments en vente libre en Belgique et les produits para-pharmaceutiques sont disponibles à la vente 
          sur le teritoire belge (adresse de livraison en Belgique).<br/>
          Pour les autres pays, seuls les produits para-pharmaceutiques sont autorisés à l’exportation.

          Toutes les commandes passées sur le site pharmachezvous sont traitées au sein de l’officine sans passer par des sous-traitants.

          Si vous ne trouvez pas un produit, vous pouvez nous envoyer un mail et nous le mettrons en ligne dans les 48h.


          Pour toutes informations complémentaires, contactez-nous par mail: info@pharmaonline.be
		</p>
                
		
</div> 
