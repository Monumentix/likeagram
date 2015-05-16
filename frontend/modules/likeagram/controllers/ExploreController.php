<?php

namespace app\modules\likeagram\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

use app\modules\likeagram\models\SearchForm;
use app\modules\likeagram\clients\Instagram;
use yii\authclient\OAuthToken;

class ExploreController extends Controller
{
    public function behaviors(){
        return [
          'access' => [
              'class' => AccessControl::className(),
              'only' => ['feed','search','media','next'],
              'rules' => [
              /*[
                  'allow'=>true,
                  'actions'=>['index'],
                  'roles' => ['?'],    
              ],*/
              [
                  'allow' => true,
                  'actions'=>['feed','search','media','next'],
                  'roles' => ['@'],    
              ],
            ],//end rules
          ],  
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionSearch()
    {
        $client = new Instagram();                
        $searchForm = new SearchForm;                        
        
        if(isset($_POST['SearchForm'])){
            //Cleanse this??            
            //
            //  Module level function to cleanse input
            //  strip hashtags, only allow a-Z0-9 and 's
            //
            
            $media = array();
            $terms = explode(',',$_POST['SearchForm']['searchTerms']);       
            $previous = array();
            foreach($terms as $x => $tag){                  
                $results = $client->getTagsMedia(trim($tag));                                
                $final = array_merge($previous, $results['data']);
                $previous = $final;
            }
            
            $media['data'] = $final; 
            
            /*
            echo"<pre>";
                print_r($media);
            echo"</pre>";
            */
            
            /*
            $media = $client->getPopular();   
            echo"<pre>";
                print_r($media);
            echo"</pre>";
            */
            
            
            return $this->render('search',
                [
                    'media'=>$media,
                    'searchForm'=>$searchForm,                
                ]
            );
            
            
        }else{            
            $media = $client->getPopular();                        
            return $this->render('search',
                [
                    'media'=>$media,
                    'searchForm'=>$searchForm,                
                ]
            );
        } 
        
    }//end actionSearch

   
    
    
    public function actionMedia(){        
        if(isset($_POST['mediaid'])){
            //sanitize this input for just numbers and underscores
            $mediaId = $_POST['mediaid'];
            
            $client = new Instagram();
            $media = $client->getMedia($mediaId);
            
            if($media['meta']['code']==200){
                //returned a good request                
                
                return $this->renderPartial('_views/mediaDetails', 
                    [             
                        'data' => $media['data'],
                    ]
                );                  
                
            }
            
            
        }else{
            echo 'I got nothing for you kid.';            
        }
    }//end actionMedia
    
    
    public function actionPopular(){
        $client = new Instagram();
        $media = $client->getPopular();
        
        return $this->render('popular', 
            [             
             'media' => $media,
            ]
        );                 
    }
    
    public function actionFeed()
    {       
        $client = new Instagram();
        $media = $client->getUserFeed();
        return $this->render('feed', 
            [             
             'media' => $media,
            ]
        );                        
    }//end feed action    

    
    public function actionNext(){         
        $client = new Instagram();
        if(isset($_GET['max_id'])){
            $results = $client->getNextPage($_GET['max_id']);
            
            if(array_key_exists('next_max_id', $results['pagination'])){
                echo $this->renderPartial('_views/mediaGrid', [
                    'firstPage'=>false,
                    'media'=>$results['data'],
                    'pager'=>$results['pagination']['next_max_id'],
                ]);           
            }       
        }//end if max_id
   }//end actionNExt
   
   
}//end class
