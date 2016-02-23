<?php
include "util/fonctions.php";
include "vues/entete.html";
if(!isset($_REQUEST['action']))
    $action = 'menu';
else 
    $action = $_REQUEST['action'];

if(!isset($_REQUEST['page']))
    $page = 1;
else 
    $page = $_REQUEST['page'];
switch($action)
{
    case 'menu':
        include "vues/menuPage.php";
        break;
    case 'connection':
        include "vues/connectionPage.php";
        break;
    case 'addAnime':
        include "vues/addAnime.php";
        break;
    case 'viewAnime':
        $table = "anime";
        $anims = getAllInTable($table, "id_".$table, "name_".$table, $page);
        $numPage = getNumPage($table) / 20;
        include "vues/viewAnime.php";
        include "vues/viewAnimePage.php";
        break;
    case 'viewCharacter':
        $table = "characters";
        $chara = getAllInTable($table, "id_".$table, "name_".$table, $page);
        $numPage = getNumPage($table) / 20;
        include "vues/viewCharacter.php";
        include "vues/viewCharacterPage.php";
        break;
    case 'viewOav':
        $table = "oav";
        $oav = getAllInTable($table, "id_".$table, "name_".$table, $page);
        include "vues/viewOav.php";
        include "vues/viewOavPage.php";
        break;
    case 'viewData':
        include "vues/viewData.php";
        break;
    case 'addData':
        include "vues/addData.php";
        break;
    case 'deleteData':
        $anims = getAllInTable("anime", "id_anime", "name_anime", $page);
        $chara = getAllInTable("characters", "id_character", "nom_character", $page);
        $oav = getAllInTable("oav_anime", "id_oav", "name_oav", $page);
        include "vues/deleteData.php";
        break;
 }

/*
$user = array();

$co = coBDD();

  $recupUser = "SELECT * FROM Adherent;";

  $resultat = mysql_query($recupUser);

$i = 0;
  while($row = mysql_fetch_assoc($resultat)) {
    $user[$i] = array($row);

    echo $user[$i]["pseudo"];
    echo $user[$i]["mdp"];
    echo $user[$i]["nom"];
    echo "test";

   $i += 1;
  }
echo "test";*/











?>
</body>
</html>
