<?php

namespace app\modules\likeagram;
use app\modules\likeagram\clients\Instagram;
use yii\authclient\OAuthToken;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\likeagram\controllers';
    
    public function init()
    {
        parent::init();
       

// custom initialization code goes here
    }
    
    public function beforeAction($action)
    {
        if(parent::beforeAction($action)){
            //Make sure our user is authenicate properlly before doing any action
            if($this->isAuthorized()){
                return true;
            }
            \Yii::$app->getUser()->logout();
            \Yii::$app->getSession()->setFlash('error', 'Please Login using your Instagram account!');
            \Yii::$app->controller->redirect('/user/login');                
        }else{
            return false;
        }
    }
    
    
    /*
     *  Checks to ensure our user is authenticated with an access token
     * 
     *  IBSR:  think this needs to be refined to better handle edge cases
     * 
     */
    private function isAuthorized(){                        
        $client = new Instagram();
        if(null === $client->getAccessToken()){
            return FALSE;
        };                  
        return TRUE;                
    } 
    
    public function time_passed($timestamp)
    {
        $diff = time() - (int)$timestamp;

        if ($diff == 0) 
             return 'just now';

        $intervals = array
        (
            1                   => array('year',    31556926),
            $diff < 31556926    => array('month',   2628000),
            $diff < 2629744     => array('week',    604800),
            $diff < 604800      => array('day',     86400),
            $diff < 86400       => array('hour',    3600),
            $diff < 3600        => array('minute',  60),
            $diff < 60          => array('second',  1)
        );

         $value = floor($diff/$intervals[1][1]);
         return $value.' '.$intervals[1][0].($value > 1 ? 's' : '').' ago';
    }
    
    public function cleanSummaryText($summary){
        $cleansed = htmlspecialchars($summary);        
        return $cleansed;
    }
    
   
    
}
