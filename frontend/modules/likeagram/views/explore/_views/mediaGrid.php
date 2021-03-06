<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if(!isset($columnSettings)){$columnSettings = 'col-xs-12 col-sm-4 col-md-3 col-lg-3';}
?>

<?php foreach($media as $item=>$data): ?>  
            <div class="media-item <?php echo($item === 0 && $firstPage === true ? 'first-item ':'not-equal');?>  <?php echo ($firstPage === false ? ' newpage ' : '' ); ?> item  <?=$columnSettings;?>   <?php foreach($data['tags'] as $tag){echo $tag.' ';}?> <?=(($item % 1) == 1  ? ' item-small' : ' item-thumb') ; ?> ">                    
               
                <?php if(array_key_exists('videos', $data)): ?>
                
                 <a  onclick="loadMediaModal('<?=$data['id']?>')" data-mediaId="<?=$data['id']?>" >   
                     <div class="profile-wrapper img img-thumbnail" >
                            <div class="profile-header">
                                <span class="likescount"><?=$data['likes']['count'] ?><span class="glyphicon glyphicon-heart"></span></span>
                                <img class="profile-picture img img-circle box-shadow" src="<?=$data['user']['profile_picture'] ?>">
                                    <span class="profile-username "><?=$data['user']['username']; ?></span>
                                    <span class="profile-posted-ago "><?= \Yii::$app->controller->module->time_passed($data['caption']['created_time']); ?> </span>
                                
                            </div>                                                   
                         <video controls class="mediaImage img img-responsive img-rounded">
                             <source src="<?=$data['videos']['low_bandwidth']['url'];?> " type="video/mp4">
                             Your browser does not support the video tag.
                         </video>
                            <div class="media-post-summary">
                                <p class="caption-text"> <?=$data['caption']['text'];?></p>
                            </div>
                        </div>
                 </a>                 
                  <?php elseif(array_key_exists('images', $data)): ?>
                    <a  onclick="loadMediaModal('<?=$data['id']?>')" data-mediaId="<?=$data['id']?>" >
                        <div class="profile-wrapper img img-thumbnail" >
                            <div class="profile-header">
                                <span class="likescount"><?=$data['likes']['count'] ?><span class="glyphicon glyphicon-heart"></span></span>
                                <img class="profile-picture img img-circle box-shadow" src="<?=$data['user']['profile_picture'] ?>">
                                    <span class="profile-username "><?=$data['user']['username']; ?></span>
                                    <span class="profile-posted-ago "><?= \Yii::$app->controller->module->time_passed($data['caption']['created_time']); ?> </span>
                                
                            </div>                        
                            <img  class="mediaImage img img-responsive img-rounded " src="<?= $data['images']['low_resolution']['url'] ;?> " alt="<?=$data['caption']['text'];?>"/>                                        
                            <div class="media-post-summary">
                                <p class="caption-text"> <?=$data['caption']['text'];?></p>
                            </div>
                        </div>
                    </a>
                <? endif ?>            
                 
                 
            </div>
        <?php endforeach; ?>       
    <div id="media-pager" class="media-pager-wrapper" data-link="<?=$pager;?> "></div>         