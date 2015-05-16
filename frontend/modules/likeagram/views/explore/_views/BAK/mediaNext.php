<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 

?>

<?php foreach($media as $item=>$data): ?>  
    <div class="newpage item col-xs-12 col-sm-6 col-md-4 col-lg-3 animate  <?php foreach($data['tags'] as $tag){echo $tag.' ';}?> <?=(($item % 1) == 1  ? ' item-small' : ' item-thumb') ; ?> ">    
        <?php if(array_key_exists('images', $data)): ?>
            <a onclick="showModal('<?=$data['id']?>')" data-largesrc="<?=$data['images']['standard_resolution']['url'];?>" data-title="<?=$data['caption']['text'];?>" data-tags="<?php foreach($data['tags'] as $tag){echo $tag.' ';}?>" data-description="<?php foreach($data['tags'] as $tag){echo $tag.' ';}?>">
                <img  class="img img-responsive img-thumbnail" src="<?=(($item % 3) == 0  ? $data['images']['low_resolution']['url'] : $data['images']['standard_resolution']['url']) ; ?>   <?=$data['images']['thumbnail']['url'];?>" alt="<?=$data['caption']['text'];?>"/>                
            </a>
        <? endif ?>            
        <?php if(array_key_exists('videos', $data)): ?>
             <a class="videolink" href="#" data-largesrc="<?=$data['videos']['standard_resolution']['url'];?>" data-title="<?=$data['caption']['text'];?>" data-description="<?php foreach($data['tags'] as $tag){echo $tag.' ';}?>">                
            </a>
        <? endif ?>        
    </div>
<?php endforeach; ?>   

<div id="media-pager" class="media-pager-wrapper" data-link="<?=$pager;?> "></div>