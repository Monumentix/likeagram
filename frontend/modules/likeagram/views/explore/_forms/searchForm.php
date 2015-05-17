<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin([
    'id'=>'searchTerms',
    'options'=>[
        'class'=>'exploreForm form-inline',
    ],
]); 
?>
<div class="input-group searchBox text-left">
    <span class="input-group-btn"> 
         <?= Html::submitButton( 'Submit<span class="glyphicon glyphicon-search"></span>', 
                ['class' => 'btn btn-primary']
        ) 
        ?>
    </span>
    <?php
    // Form field without label
    echo $form->field($searchForm, 'searchTerms', [
    'inputOptions' => [
        'placeholder' => $searchForm->getAttributeLabel('searchTerms'),
        ],
    ])->label(false);
?>
</div>   
