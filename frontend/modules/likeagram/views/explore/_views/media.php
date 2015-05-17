<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

 * 
 *      Perhaps make a complete seperate link for the mobile browsers?
 *      Would serve as full page alternative as well, so one can view full post detail
 *      If that view is scaled well, it might work in desktop/tablet detail view?
 * 
 *  
 */
?>
<?php   
    use app\modules\likeagram\LikeagramAsset;
    
    echo $this->render('mediaDetails', 
        [
            'data'=>false,
        ]
    );    
?>      
<div class="row">
    <div class="col-xs-6 text-left">
        <h2 class="media-grid-heading ">
            <?=$mediaTitle.': '?>
            <span class="filter-name">
                All
            </span>
        </h2>
    </div>
    <div class="col-xs-6 text-right">
        <h4 class="media-grid-heading ">
            <span class="filter-count">
                0
            </span>
                out of 
            <span class="filter-total">
                0 
            </span>
                total
        </h4>
    </div>
</div>


<div id="media-grid" class="">
    <div class="grid-sizer"></div>
    <?php

        if(!isset($columnSettings))
	{$columnSettings = 'col-xs-12 col-sm-4 col-md-3 col-lg-3';}

	echo $this->render('mediaGrid', 
                [
                'firstPage'=>$firstPage,
                'columnSettings'=>$columnSettings,
                'media'=>$media,
                'pager'=>$pager,
                ]
         );
	
    ?>        
</div>
<div class="row"></div>
<div class="more-text row">
    <h2 align="center">        
            <a id="clickForMore"> 
                <span class="glyphicon glyphicon-download"></span>
                    &nbsp; More &nbsp; 
                <span class="glyphicon glyphicon-download"></span>
            </a> 
    </h2>
</div>
<div class="animation_image" style="display:none" align="center" >    
    <img src="/images/dark-grey-horz.GIF">    
</div>


<?php // foreach($media as $item=>$data){ echo "<pre>"; print_r($data); echo "</pre>"; } ?>

