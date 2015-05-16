<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="filters" class="">    
    <h2 class=""><span class="glyphicon glyphicon-tags"></span>&nbsp;Tags :<span class="small">&nbspClick any tag to filter your feed</span></span></h2>
<?php
   $allTags = array(); //Collection array
   $tagSummary = array();  //Summary Values

   foreach($media as $post){
       $allTags = array_merge($post['tags'], $allTags);            
   }       
   //Summary the tags appearing on this feed
   $tagSummary = array_count_values($allTags);        
   arsort($tagSummary);        

   echo"<a class='tag-filter ' data-filter='*'>All</a>";                 
   foreach($tagSummary as $tag => $tagCount){
       echo"<a class='tag-filter ' data-tagcount='".$tagCount."' data-filter='.".$tag."'>".$tag."</a>";
   }             
?>           
</div>
