$(function(){
   /*********************************** Page connexion************************************/  
                        
    $('#btnconnexion').click( function(e) {
        // les deux lignes annulent le comportement par défaut du clic
        // c'est à dire href="#" qui provoquerait un rappel de la même page
          e.preventDefault();
          e.stopPropagation();
          //var mdp = $("#mdp").val(); //récupère le contenue de la zone d'id mdp
          //var login = $("#login").val();
          /* appel d'une fonction ajax -> post*/
          // elle prend 3 arguments :
          // 1- le nom de la fonction php qui sera exécutée
          // 2- la liste des arguments à fournir à cette fonction
          // 3- le nom de la fonction JS qui sera exécutée au "retour" du serveur 
          $.post("ajax/traiterconnexion.php",{
              // valorise les deux arguments passés à la fonction traiterconnexion.php
          },
                foncRetourConnexion, "json");
       });
     /* fonction JS qui sera exécutée après le retour de l'appel ajax précedent */
     // le paramètre data représente la donnée envoyée par le serveur
     // résultat de l'appel de la fonction retourConnexion.php
    function foncRetourConnexion(data){
        // charge la page (data-role=page) du même document dont l'id  est le sélecteur indiqué
        $.mobile.changePage("#viewAnime");
    }
    
    
    
    
    /***************************************** Page inscription*******************************/
                    
    $('#btninscription').click( function(e) { 
        e.preventDefault();
        e.stopPropagation();
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var mail = $("#mail").val();
        var tel = $("#tel").val();
        $.post("ajax/enregistreruser.php",{
            "nom" : nom,
            "prenom" : prenom,
             "mail" : mail,
             "tel"  : tel,
             "service" :  $("input[type=radio][name=service]:checked").attr("value")},
            foncRetourEnregistrement );    
                                
    });
    function foncRetourEnregistrement(data){
        $("#divinscrit").html(data);
    }



    /***************************************** Anime Alone Page *******************************/

    $("#listAnim > li").click( function(e) { //Clic on an element of "listAnim" 

        var id = $(this).attr("id"); // "id" take the value of "id" attribute (attr('id'))
        $.post("ajax/getAnimAlone.php",{
            "idAnim" : id},
            foncReturnAnims, "json");
    });

    $("#charaAlone > a").click( function(e) { //Clic on an element of "charaAlone" 

        var id = $(this).attr("id"); // "id" take the value of "id" attribute (attr('id'))
        $.post("ajax/getAnimAlone.php",{
            "idAnim" : id},
            foncReturnAnims, "json");
    });


    function foncReturnAnims(data){

        var name = data['name_anime'];
        var numberEpisode = data['number_episode_anime'];
        var currentSaison = data['num_saison_anime'];
        var numberSaison = data['number_saison_anime'];
        var grade = data['grade_anime'];
        var streaming = data['site_streaming_anime'];

        $("#name").html(name);
        $("#numberEpisode").html(numberEpisode);
        $("#currentSaison").html(currentSaison);
        $("#numberSaison").html(numberSaison);
        $("#grade").html(grade);
        $("#streaming").html(streaming);
    } 
    
    
    /***************************************** Character Alone Page *******************************/


    $("#listChara > li").click( function(e) { //Clic on an element of "listChara" 

        var id = $(this).attr("id"); // "id" take the value of "id" attribute (attr('id'))
        $.post("ajax/getCharaAlone.php",{
            "idChara" : id},
            foncReturnChara, "json");
    });


    function foncReturnChara(data){

        var name = data['name_characters'];
        var grade = data['grade_anime'];
        var animes = data['chara_in_anime'];
        var lesAnimes = ""
/*
        for (let anim of animes) {
            lesAnimes += "<a href=\"index.php?action=viewAnime#viewAnimePage\" id=\"" + anim['id_anime'] + "\">" + anim['name_anime'] + "</a>"
        }*/

        $("#name").html(name);
        $("#grade").html(grade);
        $("#animes").html(lesAnimes);
    } 
    
    
    
}); // fin fonction principale/* 