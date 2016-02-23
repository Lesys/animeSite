<div data-role="page" id="pageinscription">
<?php
include "vues/entetepage.html";
include "vues/logo.html";

$user = array();

$co = coBDD();

  $recupUser = "SELECT * FROM Adherent;";

  $resultat = mysql_query($recupUser);
if ($resultat != NULL) {
	$i = 0;
	  while($row = mysql_fetch_assoc($resultat)) {
	    $user[$i] = array($row);

	    echo $user[$i]["pseudo"];
	    echo $user[$i]["mdp"];
	    echo $user[$i]["nom"];
	    echo "test";

	   $i += 1;
	  }
	$user = array("id"=>"cool");
	echo $user["id"];
}
else {
	echo "c'est nul";
}
?>
<div data-role="content" id="divinscrit">
	<form action="#" rel="external">
		<b>Nom: <input type="text" name="nom" id="nom" required autofocus=""autofocus/></b><br>
		<b>Prenom: <input type="text" name="prenom" id="prenom" required=""/></b><br>
		<b>Mail: <input type="text" name="mail" id="mail" required=""/></b><br>
		<b>Téléphone: <input type="text" name="tel" id="tel" required=""/></b><br>

		<fieldset data-role="controlgroup" data-type="horizontal" required="">
		    <legend><b>Indiquer votre service<b>: </legend>
		    <input name="service" id="search" value="on" checked="checked" type="radio">
		    <label for="search">Recherche</label>
		    <input name="service" id="prod" value="off" type="radio">
		    <label for="prod">Production</label>
		    <input name="service" id="commercial" value="other" type="radio">
		    <label for="commercial">Commercial</label>
		    <input name="service" id="secu" value="other" type="radio">
		    <label for="secu">Sécurité</label>
		</fieldset>

		<input type="submit" id="btninscription" name="btninscription" value="Envoyer">
	</form>
</div>
 <?php
   include "vues/pied.html";
?>
</div><!-- /page -->