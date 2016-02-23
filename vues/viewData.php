<div data-role="page" id="viewData">
<?php
    include "vues/entetepage.html";
?>
    <div data-role="content" id="choice">
          <table id="DataView">
               <tr>
                    <td><a href="index.php?action=viewAnime" rel="external">View Anime List</a></td>
                    <td><a href="index.php?action=viewCharacter" rel="external">View Character List</a></td>
                    <td><a href="index.php?action=viewOav" rel="external">View Oav List</a></td>
                </tr>
          </table>
    </div><!-- /content -->
    <?php    
    include "vues/pied.html";
    ?>
</div> <!-- /page -->
