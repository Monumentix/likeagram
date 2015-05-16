<?php
    use yii\bootstrap\Modal;
    use app\modules\likeagram\LikeagramAsset;
    LikeagramAsset::register($this);  // $this represents the view object
?>

  

<div class="likeagram-selfie-index col-md-9">    
    <?php foreach ($media['data'] as $post){
        echo "<img  class='flush mediaImage img img-responsive ' src='".$post['images']['low_resolution']['url']."'>";  
        }
    ?>
    
    <?  
        /*
        if(!empty($media['data'])){        
            echo $this->render('_views/media', 
                [
                'mediaTitle'=>'Popular On Instagram',
                'columnSettings'=> ' col-xs-4 col-sm-3 col-md-2 col-lg-2',
                'firstPage'=>true,
                'media'=>$media['data'],
                'pager'=>false 
                ]
            );
        } 
         * 
         */ 
    ?>
</div>
