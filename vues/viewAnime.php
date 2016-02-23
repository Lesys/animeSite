<div data-role="page" id="viewAnime">
<?php
    include "vues/entetepage.html";
?>
    <div data-role="content" id="divliste"> 
        <ul data-role="listview" id="listAnim">
<?php
    if ($anims == NULL) {
        echo 'Problem with fonction in util/fonctions.php ==> No result from the request';
    }
    foreach ($anims as $unAnim) { ?>
        <li class="popup" id="<?php echo $unAnim['id_anime']; ?>">
            <a href ="#viewAnimePage">
                <?php echo $unAnim['name_anime']."<pre> Episode: ".$unAnim['number_episode_anime']." / Saison: ".$unAnim['num_saison_anime']."</pre>"; ?>
                <span>
                    <img src="images/animes/<?php echo $unAnim['name_anime_image']; ?>" alt="Picture from anime <?php echo $unAnim['name_anime']; ?>">
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
                    <a class="ui-link-inherit" href="index.php?action=viewAnime&page=<?php echo $i; ?>" rel="external"><?php
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
