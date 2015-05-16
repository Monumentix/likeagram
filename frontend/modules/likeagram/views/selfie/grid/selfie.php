<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
    foreach ($media['data'] as $post){
        echo "<div class='--selfieItem flush col-xs-2  tagWall'>";
        echo "<a onclick=\"loadMediaModal('".$post['id']."')\" >";  
        echo "<img  class='img img-responsive ' src='".$post['images']['low_resolution']['url']."'>";
        echo "</a></div>";          
    }
?>