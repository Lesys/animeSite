<div data-role="page" id="viewDataPage"> 
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
     	<!--<ul id="data" data-role="listview">
               <li id="name"></li>
               <li id="numberEpisode"></li>
               <li id="currentSaison"></li>
               <li id="numberSaison"></li>
               <li id="grade"></li>
               <li id="streaming"></li>
          <li>
          </ul>-->
     </div><!-- /animAlone -->
    
    
    
 </div><!-- /content -->
<?php
    include "vues/pied.html";
?>
</div><!-- /page -->