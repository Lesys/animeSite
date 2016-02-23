<div data-role="page" id="pageoffresoffertes">
<?php
    include "vues/entetepage.html";
?>
    <div data-role="content" id="divliste"> 
<?php
    $jour = "";
    foreach ($lesOffres as $uneOffre){
        if($jour!=$uneOffre['jour']){
            if ($jour!=""){
                ?> </ul></div> <?php
            }
            $jour=$uneOffre['jour']; ?>
            <div data-role="collapsible">
                <h1> <?php echo $jour ?></h1>
                <ul data-role="listview" id="lstoffres">
        <?php 
        } //fin si
        $voyage = $uneOffre['retour'];
        $vers = "vers";
        if (! $voyage) {
            $voyage = $uneOffre['depart'];
            $vers = "de";
        }
        ?>
                    <li id="<?php echo $uneOffre['id'];?>">
                        <a href ="#pageoffre" ><?php echo $uneOffre['date']." à ".$uneOffre['heure']." ".$vers." ".$voyage;?> </a>
                    </li>
    <?php 
    } //fin foreach
    ?>
                </ul>
            </div><!-- /collapsible -->
        </div><!-- /content -->
    <?php    
    include "vues/pied.html";
    ?>
</div> <!-- /page -->
