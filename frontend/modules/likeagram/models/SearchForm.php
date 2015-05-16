<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\modules\likeagram\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $searchTerms;
    
    public function rules(){
        return [
            ['searchTerms','required']
            
        ];        
    }
    
      /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'searchTerms' => 'Tag1, Tag2, Tag3, Tag4, Tag5',
        ];
    }
    
    
    
    
    
}//end class


?>
