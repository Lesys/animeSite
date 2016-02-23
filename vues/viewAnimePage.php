<div data-role="page" id="viewAnimePage"> 
<?php
include "vues/entetepage.html";
?>
 <div data-role="content" >  
     <div id="animAlone">
          <table>
               <thead>
                    <tr>
                         <th>Name Anime</th>
                         <th>Nomber of episodes</th>
                         <th>Current Saison</th>
                         <th>Total Saison</th>
                         <th>Grade in top 20</th>
                         <th>Streaming site</th>
                    </tr>
               </thead>

               <tr>
                    <td id="name"></td>
                    <td id="numberEpisode"></td>
                    <td id="currentSaison"></td>
                    <td id="numberSaison"></td>
                    <td id="grade"></td>
                    <td id="streaming"></td>
               </tr>
          </table>
     </div><!-- /animAlone -->
    
    
    
 </div><!-- /content -->
<?php
    include "vues/pied.html";
?>
</div><!-- /page -->