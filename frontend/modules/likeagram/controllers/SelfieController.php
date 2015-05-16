<?php

namespace app\modules\likeagram\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

use app\modules\likeagram\clients\Instagram;
use yii\authclient\OAuthToken;

class SelfieController extends Controller
{
    public function behaviors(){
        return [
          'access' => [
              'class' => AccessControl::className(),
              'only' => ['index'],
              'rules' => [
              /*[
                  'allow'=>true,
                  'actions'=>['index'],
                  'roles' => ['?'],    
              ],*/
              [
                  'allow' => true,
                  'actions'=>['index'],
                  'roles' => ['@'],    
              ],
            ],//end rules
          ],  
        ];
    }
    
    
    public function actionIndex()
    {       
        $client = new Instagram();  
        $media = $client->getTagsMedia('selfie');            
        
        return $this->render('index',[
                 'media'=>$media,
        ]);        
    }
    
    public function actionNext(){
        $client = new Instagram();  
        $media = $client->getTagsMedia('selfie');    
        
        return $this->renderPartial('grid/selfie',[
            'media'=>$media,
            'firstPage' => false, 
        ]);        
    }
        
    
    
}//end class
