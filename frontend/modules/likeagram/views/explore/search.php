<?php
    use yii\bootstrap\Modal;
    use app\modules\likeagram\LikeagramExploreAsset;
    LikeagramExploreAsset::register($this);  // $this represents the view object
?>

  

<div class="col-xs-8 col-sm-6 col-md-7 col-lg-8 likeagram-explore-feed ">    
    <?php
        if(!empty($media['data'])){        
            echo $this->render('_views/media', 
                [
                'mediaTitle'=>'Popular On Instagram',
                'columnSettings'=> ' col-xs-12 col-sm-4 col-md-3 col-lg-3 ',
                'firstPage'=>true,
                'media'=>$media['data'],
                'pager'=>false 
                ]
            );
        }  
    ?>
</div>
<div class="col-xs-4 col-sm-6 col-md-5 col-lg-4 likeagram-explore-detail">
    <div id="explore-feed-detail" class="">
        <h3 class="text-center" >Explore and Discover:</h3>
            <?php
                echo $this->render('_forms/searchForm',[
                    'searchForm'=>$searchForm,
                ]);                      
            ?>
                
    </div>
</div>
