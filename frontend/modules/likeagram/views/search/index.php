<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
    use app\modules\likeagram\LikeagramBaseAsset;
    use app\modules\likeagram\LikeagramSearchAsset;
    LikeagramBaseAsset::register($this); 
    LikeagramSearchAsset::register($this);  // $this represents the view object    
?>
    
<?php 
    echo $this->render('_views/mediaDetails', 
        [
            'data'=>false,
        ]
    );
?>

<div class="likeagram-search-index">
    <div class="col-xs-6 text-left">
        <h3>Searching : <?=$searchTitle?></h3>
    </div>
    <div class="col-xs-6 text-right">
        <?php 
           echo $this->render('_forms/search',[
               'searchForm' => $searchForm,               
               'searchTags' => $searchTags,    
           ]);
        ?>
    </div>
    
    <div class="col-xs-12">
        <?php 
            if(!isset($media)){
                $media = false;
            }
        
            echo $this->render('_grids/results', [
                'results'=>$media,
            ]);
        ?>    
    </div>
</div>
