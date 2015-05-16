<?php
    use yii\bootstrap\Modal;
    use app\modules\likeagram\LikeagramSelfieAsset;
    LikeagramSelfieAsset::register($this);  // $this represents the view object
?> 
<!--
<div class="col-xs-12 preLoadMessage">
    <h3>Loading the Selfie wall : <small>Strap in! This could get bumpy!</small></h3>
</div>
-->

<?php
    echo $this->render('_views/mediaDetails', 
        [
            'data'=>false,
        ]
    );
?>
<div class="row-fluid">
    <div id="selfieGrid" class="rowlikeagram-selfie-index">
            <?php     /*   
                echo $this->render('grid/selfie',
                    [
                        'media'=>$media,
                        'firstPage' => true,
                    ]                
                );      */  
            ?>    
    </div>
    <div id="nextPagePlaceholder"></div>              
</div>
