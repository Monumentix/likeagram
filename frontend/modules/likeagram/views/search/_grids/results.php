<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
//Data needed not contained in Query results
$firstPage = '';
$columnSettings = '';
?>
<div id="mediaGrid">
<?php if($results != FALSE): ?>
    <?php foreach($results as $tag => $result):?>
        <div class="col-md-<?=round((12/(count($results))), 0, PHP_ROUND_HALF_UP);?>">
            <h3><?=$tag;?>( <?=count($result['data']);?>)</h3>
            <?php foreach($result['data'] as $item=>$data): ?>              
            <div class="media-item <?php echo($item === 0 && $firstPage === true ? 'first-item ':'not-equal');?>  <?php echo ($firstPage === false ? ' newpage ' : '' ); ?> item  <?=$columnSettings;?>   <?php // foreach($data['tags'] as $tag){echo $tag.' ';}?> <?=(($item % 1) == 1  ? ' item-small' : ' item-thumb') ; ?> ">                    
               

                    <a  onclick="loadMediaModal('<?=$data['id']?>')" data-mediaId="<?=$data['id']?>" >
                        <div class="profile-wrapper img img-thumbnail" >
                            <div class="profile-header">
                                <span class="likescount"><?=$data['likes']['count'] ?><span class="glyphicon glyphicon-heart"></span></span>
                                <img class="profile-picture img img-circle box-shadow" src="<?=$data['user']['profile_picture'] ?>">
                                    <span class="profile-username "><?=$data['user']['username']; ?></span>
                                    <span class="profile-posted-ago "><?= \Yii::$app->controller->module->time_passed($data['caption']['created_time']); ?> </span>
                                
                            </div>                        
                            <img  class="mediaImage img img-responsive img-rounded " src="<?= $data['images']['low_resolution']['url'] ;?> " alt="<?=\Yii::$app->controller->module->cleanSummaryText($data['caption']['text']);?>"/>                                        
                            <div class="media-post-summary">
                                <p class="caption-text"> <?=$data['caption']['text'];?></p>
                            </div>
                        </div>
                    </a>
                 
                 
            </div>
            
            
            
            
            
            <?php endforeach; ?>   
       </div>
    <?php endforeach; ?>   
<?php else: ?>
    NOTHING YET
<?php endif; ?>
</div>

