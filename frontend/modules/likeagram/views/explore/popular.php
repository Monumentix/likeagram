<?php
    use app\modules\likeagram\LikeagramExploreAsset;
    LikeagramExploreAsset::register($this);  // $this represents the view object
?>
<div class="col-xs-8 col-sm-6 col-md-7 col-lg-8 likeagram-explore-feed ">
    <?php if(!empty($media['data']))
    {
            echo $this->render('_views/media',
                [
                  'mediaTitle'=>'Popular on Instagram',
                  'firstPage'=>true,
                  'media'=>$media['data'],
                  'pager'=>false
                ]
            ); 
        
        }
    ?>
</div>
<div class="col-xs-4 col-sm-6 col-md-5 col-lg-4 likeagram-explore-detail">
    <div id="explore-feed-detail">
        <?php
            echo $this->render('_views/feedDetails',
                [
                    'media'=>$media['data'],
                ]
            );
        ?>
    </div>
</div>

