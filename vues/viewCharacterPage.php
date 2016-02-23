<div data-role="page" id="viewCharacterPage"> 
<?php
include "vues/entetepage.html";
?>
 <div data-role="content" >  
     <div id="charaAlone">
          <table>
               <thead>
                    <tr>
                         <th>Name Character</th>
                         <th>Grade in top 20</th>
                         <th>Animes</th>
                    </tr>
               </thead>

               <tr>
                    <td id="name"></td>
                    <td id="grade"></td>
                    <td id="animes"></td>
               </tr>
          </table>
     </div><!-- /animAlone -->    
 </div><!-- /content -->
<?php
    include "vues/pied.html";
?>
</div><!-- /page -->