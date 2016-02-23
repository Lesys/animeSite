<?php
	include "../util/fonctions.php";

	$nom = $_REQUEST['nom'];
	$prenom = $_REQUEST['prenom'];
	$mail = $_REQUEST['mail'];
	$service = $_REQUEST['service'];
	$tel = $_REQUEST['tel'];
	// enregistrerEnBase(...); pas dans cette itération

	//Sélectionne la première lettre du prénom et la met en majuscule. Prend le nom, met tout en minuscule + la première en majuscule
	$login=strtoupper($prenom[0]).ucfirst(strtolower($nom));

	//Créé un mot de passe aléatoire grâce à la méthode mdpRandom()
	$mdp = mdpRandom();



	echo "Login : ".$login."<br>Mot de passe : ".$mdp."<br>Merci de votre visite et à bientôt";
?>