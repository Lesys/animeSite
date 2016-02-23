<?php
//Check the user and the connection
function verifuser($pseudo, $mdp) {

  $co = coBDD();

  $recupPseudo = "SELECT * FROM user WHERE login = '".$pseudo."' AND mdp = '".$mdp."';";//".$_GET['pseudo']."

  $resultat = $connection->query($recupPseudo);

  if ($resultat->fetch() == NULL) {
    echo "<font color='red'>";
    echo "Mot de passe ou login incorrect";
    echo "</font>";
  }
  else {
  }

  return $userCo;
}


//Connection to the DataBase "animes" with the "root" login
function coBDD() {
    $PARAMHost='localhost'; //Path to the server
    $PARAMPort='3306'; //Server port
    $PARAMDBName='animes'; //DataBase name
    $PARAMUser='root'; //User login
    $PARAMPassword='passe'; //User Password

    $connection = new PDO('mysql:host='.$PARAMHost.';port='.$PARAMPort.';dbname='.$PARAMDBName, $PARAMUser, $PARAMPassword,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $connection;
}

function getNumPage($table) {
    $co = coBDD();
    $query = "SELECT COUNT(*) FROM ".$table.";";
    $numFetch = $co->query($query);

    return $numFetch->fetchColumn();
}

function getAnime($row) {
    $return = array( //Array for the row
        "id_anime"=>$row['id_anime'],
        "name_anime"=>$row['name_anime'],
        "number_episode_anime"=>$row['number_episode_anime'],
        "num_saison_anime"=>$row['num_saison_anime'],
        "number_saison_anime"=>$row['number_saison_anime'],
        "grade_anime"=>$row['grade_anime'],
        "site_streaming_anime"=>$row['site_streaming_anime'],
        "name_anime_image"=>$row['name_anime_image']);
    return $return;
}

function getChara($row) {
    $co = coBDD();
    $anims = array();

    $selectAnimeChara = "SELECT * FROM characters
    INNER JOIN chara_in_anime
    ON chara_in_anime.id_characters_chara_in_anime = characters.id_characters
    INNER JOIN anime
    ON anime.id_anime = chara_in_anime.id_anime_chara_in_anime
    WHERE id_characters = ".$row['id_characters'];

    $charaAnim = $co->query($selectAnimeChara);
    $i = 0;
    while ($chara = $charaAnim->fetch()) {
        $anims[$chara[$i]] = getAnime($chara);
        $i++;
    }

    $return = array( //Array for the row
        "id_characters"=>$row['id_characters'],
        "name_characters"=>$row['name_characters'],
        "grade_characters"=>$row['grade_characters'],
        "name_characters_image"=>$row['name_characters_image'],
        "chara_in_anime"=>$anims);

    return $return;
}

//Take all fetchs in the query and put it in a double array
function getAllFetchs($theFetch, $table, $id) {

    if ($table == "anime") { //If the search is on the "anime" table
        while ($row = $theFetch->fetch()) { //For each row in the result of the query
            $return[$row[$id] - 1] = getAnime($row);
        }
    }
    else if ($table == "characters") { //If the search is on the "personnage" table
        while ($row = $theFetch->fetch()) { //For each row in the result of the query
            $return[$row[$id] - 1] = getChara($row);
        }
    }
    else if ($table == "oav") { //If the search is on the "oav_anime" table
        while ($row = $theFetch->fetch()) { //For each row in the result of the query
            $return[$row[$id] - 1] = array( //Array for each row
                "id_oav"=>$row['id_oav'],
                "nom_anime"=>$row['nom_anime'],
                "nom_oav"=>$row['nom_oav'],
                "type_oav"=>$row['type_oav'],
                "site_streaming_oav"=>$row['site_streaming_oav']);
        }
    }
    else {
        echo "Table inconnue; Problème dans le code..";
    }
    return $return;
}

//Take the only fetch in the query and put it in a simple array
function getOneFetch($theFetch, $table) {
    $row = $theFetch->fetch();
    $return = array();

    if ($table == "anime") { //If the search is on the "anime" table
        $return = getAnime($row);

        if ($row['site_streaming_anime']) {
            $return['site_streaming_anime'] = "<a href=\"".$row['site_streaming_anime']."\">Go to streaming</a>";
        }
        else {
            $return['site_streaming_anime'] = "<font color=\"red\">No site in the DataBase<font/>";
        }
    }
    else if ($table == "characters") { //If the search is on the "personnage" table
        $return = getChara($row);
    }
    else if ($table == "oav_anime") { //If the search is on the "oav_anime" table
        $return = array( //Array for the row
            "id_oav"=>$row['id_oav'],
            "id_anime"=>$row['id_anime'],
            "nom_oav"=>$row['nom_oav'],
            "type_oav"=>$row['type_oav'],
            "site_streaming_oav"=>$row['site_streaming_oav']);

        if ($return['site_streaming_oav']) { //If a site is in the DB
            $return['site_streaming_oav'] = "<a href=\"".$row['site_streaming_oav']."\">Go to streaming</a>";
        }
        else {
            $return['site_streaming_oav'] = "<font color=\"red\">No site in the DataBase<font/>";
        }
    }
    else {
        echo "Unknown table; problem in code page...";
    }

    return $return;
}

//Return all fetchs in a table from the DataBase to show them all
function getAllInTable($table, $id, $orderBy, $pageNum) {
    $co = coBDD(); //Connection to the DataBase

    $i = 20 * ($pageNum - 1);

    $selectAll = "SELECT * FROM ".$table." ORDER BY ".$orderBy." LIMIT ".$i.", 20;"; //Query for the SQL query
    
    $resultat = $co->query($selectAll); //All fetchs in the $resultat variable
    $tabResultat = getAllFetchs($resultat, $table, $id); //Get all fetchs from the query

    $resultat->closeCursor();
    return $tabResultat;
}

//Return the fetch in a table from the DataBase to show all about it
function getAllAbout($table, $idTable, $idField) {
    $co = coBDD();
    $selectField = "SELECT * FROM ".$table." WHERE ".$idTable." = ".$idField.";";

    $resultat = $co->query($selectField);
    $tab = getOneFetch($resultat, $table);

    $resultat->closeCursor();
    return $tab;
}