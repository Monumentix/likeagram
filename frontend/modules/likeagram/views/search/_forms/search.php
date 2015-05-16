<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//  Handle the search string placeholders and 
//  or searched values
    if(is_array($searchTags)){
        $searchString = false;
        $searchTags = implode(",",$searchTags);
    }elseif($searchTags == false){
        $searchString = 'Enter tags to search on?';
        $searchTags = false;
    }
   

//Create our Form obj
$form = ActiveForm::begin([
    'id'=>'searchForm',    
    'options'=>[
        'class'=>'searchFormInline ',
    ],
]); 

//Create our SearchBox
echo $form->field($searchForm, 'searchTerms', [
            'inputOptions' => [        
                'placeholder' => $searchString,
                'value' => $searchTags,
            ],
        ]
    )->label(false);

//Add our button
echo Html::submitButton( '<span class="glyphicon glyphicon-search"></span> SEARCH', 
    ['class' => 'btn btn-primary']
 ) 

?>



  