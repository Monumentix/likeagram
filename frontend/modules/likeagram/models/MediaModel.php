<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\modules\likeagram\models;

use yii\base\Model;

class MediaModel extends Model
{
    public $tags; //array of tags  **model**
    public $type;  //image or video
    public $location;
    public $comments; //array of comments **model**
    public $filter;
    public $created_time;  //timestamp
    public $link;
    public $likes; //array of likes data **model**    
    // low_resoltion, thumbnail, standard_resolution
    public $images; //array of image data            
    public $users_in_photo;  //array of user models?
    public $caption; //caption array data
    public $user_has_liked;  // boolean
    public $id; //MEDIA ID
    public $user; //array of user data
    
    
    
    
    public function getMediaById($id, $client){
                
    }
    
    
    /*
    public function rules(){
        return [
            ['','']            
        ];        
    }
    */
    
      /**
     * @inheritdoc
     */
    /*
    public function attributeLabels()
    {
        return [
            '' => '',
        ];
    }
    */
    
    
    
    
}//end class


?>
