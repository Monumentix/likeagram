<?php

namespace app\modules\likeagram\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    
    
    public function actionView()
    {
        return $this->render('view');
    }
    
    
    
}//end class
