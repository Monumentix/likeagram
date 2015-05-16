<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<div id="mediaDetailModalWrapper">
    <div tabindex="-1" role="dialog" class="fade modal modal-media-detail" id="mediaDetailModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content info">     
                <!--
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>     
                </div>
                -->
                    <div class="modal-body">
                        <div class="row">                            
                            <div class="col-xs-6">
                                <img  class="img img-responsive box-shadow img-rounded " src="<?= $data['images']['standard_resolution']['url'] ;?> " alt="<?=$data['caption']['text'];?>"/>                                                            
                                    <div class="media-post-summary">
                                        <p class="caption-text"> <?=$data['caption']['text'];?></p>
                                    </div>   
                            </div>
                            <div class="col-xs-6"> 
                               <div class="profile-wrapper" >
                                   <div class='row'>
                                        <div class='col-xs-2'>
                                            <img class="pull-left profile-picture img img-circle box-shadow" src="<?=$data['user']['profile_picture'] ?>">                    
                                        </div>
                                        <div class='col-xs-10'>
                                            <div class='row'>
                                                <div class='col-xs-10'>

                                                        <h4 class="profile-username left"><?=$data['user']['username']; ?></h4>

                                                        <h5 class="profile-posted-ago left "><?= \Yii::$app->controller->module->time_passed($data['caption']['created_time']); ?> </h5>                                            

                                                </div>
                                                <div class='col-xs-2'>
                                                    <span class="likescount"><?=$data['likes']['count'] ?><span class="glyphicon  glyphicon-heart"></span></span>                          
                                                </div>
                                            </div>                        
                                        </div>
                                    </div>
                                </div> 
                                <h4 class='comments-title text-center'><span class='glyphicon glyphicon-comment'></span>&nbsp;Comments(<?=$data['comments']['count'];?>)</h4>
                                <div class='comments-wrapper'>                                    
                                    <?php  
                                    if(is_array($data['comments'])){                                        
                                        foreach($data['comments']['data'] as $comment){                                                   
                                            echo"<div class='container-fluid comments-comment'>                                                
                                                <div class='row'>
                                                    <div class='col-sm-2'>
                                                        <img src='".$comment['from']['profile_picture']."' class='img img-circle box-shadow'>
                                                    </div>
                                                    <div class='col-sm-10'>
                                                        <div class='row'>
                                                            <div class='col-xs-6'>
                                                                <div class='comment-username'>".$comment['from']['username']."</div>
                                                            </div>
                                                            <div class='col-xs-6 text-right'>
                                                                <div class='comment-posted-ago'>".\Yii::$app->controller->module->time_passed($comment['created_time'])."</div>                                                
                                                            </div>
                                                        </div>
                                                        <div class='row'>                                                            
                                                            <div class='comment-text col-xs-12'>".$comment['text']."</div>                                                            
                                                        </div>
                                                    </div>        
                                                </div>
                                            </div>";
                                        }
                                    }                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                    

                    
                    
                    
                
                
                


                
                
                
            </div>
        </div>
    </div>
</div>





