
<h2>Login administration</h2>
<?php 
//si on a cliqué sur le bouton d'envoi du formulaire
if(isset($_POST['submit_login'])){
    //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
    extract($_POST,EXTR_OVERWRITE);
    $log = new AdminDB($cnx);
    //$admin et $password sont les noms des champs du formulaire
    $admin = $log->getAdmin($login, $password);
    var_dump($admin);
    if(is_null($admin)){
        print "<br/>Données incorrectes";        
    }
    else {
        $_SESSION['admin']=1;
        unset($_SESSION['page']);        
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
    }
    
}
?>
<table>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
   <tr><th> Login : </th>
    <td><input type="text" name="login" id="admin" /><br/></td></tr>
   <tr><th> Password : </th><td><input type="password" name="password" id="password"/>
    <br/></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" name="submit_login" id="submit_login" value="Se connecter"/></td></tr>
</form>
</table>


