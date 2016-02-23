<div data-role="page" id="viewAnime">
<?php
    include "vues/entetepage.html";
?>
    <div data-role="content" id="divliste"> 
        <ul data-role="listview" id="listChara">
<?php
    if ($chara == NULL) {
        echo 'Problem with fonction in util/fonctions.php ==> No result from the request';
    }

    foreach ($chara as $aChara) { 

        $i = 0;
        ?>
        <li class="popup" id="<?php echo $aChara['id_characters']; ?>">
            <a href ="#viewCharacterPage" >
                <?php echo $aChara['name_characters']."<pre> Anime from: ";

                foreach ($aChara['chara_in_anime'] as $anAnime) {
                    if ($i > 0) {
                        echo ", ";
                    }
                    echo $anAnime['name_anime']; 
                    $i++;
                    } 
                    echo "</pre>"?>
                <span>
                    <img src="images/characters/<?php echo $aChara['name_characters_image']; ?>" alt="Picture of the Character <?php echo $aChara['name_characters']; ?>">
                </span>
            </a>
        </li>
    <?php 
    } //fin foreach
    ?></ul>
        </div><!-- /content -->
        <div class="numPage">
            <?php
                $i = 1;
                while ($i <= $numPage + 1) { ?>
                    <a class="ui-link-inherit" href="index.php?action=viewCharacter&page=<?php echo $i; ?>" rel="external"><?php
                    if ($page == $i) {
                        echo '<b><u>';
                    }

                    echo $i;
                    if ($page == $i) {
                        echo '</u></b>';
                    }
                    $i++;?>
                    </a>
                <?php } ?>
            </div>
    <?php    
    include "vues/pied.html";
    ?>
</div> <!-- /page -->
