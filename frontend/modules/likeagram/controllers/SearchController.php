<?php
/* 
 *  BSR
 *  12:19:2014
 * 
 */
?>
<?php

namespace app\modules\likeagram\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;
use yii\authclient\OAuthToken;

use app\modules\likeagram\models\SearchForm;
use app\modules\likeagram\clients\Instagram;


class SearchController extends Controller
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
    
    /*
     *  Build our default search page
     * 
     * 
     */
    public function actionIndex()
    {       
        $searchForm = new SearchForm;                 
        $client = new Instagram();  
        
        if(isset($_POST['SearchForm']['searchTerms'])){
            $searchData = $this->cleanSearchTerms($_POST['SearchForm']['searchTerms']);
            
            foreach($searchData['tags'] as $tag ){                
                $media[$tag] = $client->getTagsMedia($tag);            
            }
                        
            return $this->render('index',[
                'searchTitle'=>$searchData['title'], 
                'searchTags'=>$searchData['tags'],
                'searchForm'=>$searchForm,
                'media'=>$media,
            ]);    
            
            
        }else{
            
            return $this->render('index',[
                'searchTitle' => '',
                'searchForm'=>$searchForm,
                'searchTags' => false,
                //'media'=>$media,
            ]);    
        }
    }
    
    
    
    
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
    
    
    
    /*
    public function actionNext(){
        $client = new Instagram();  
        $media = $client->getTagsMedia('selfie');    
        
        return $this->renderPartial('grid/selfie',[
            'media'=>$media,
            'firstPage' => false, 
        ]);        
    }
    */  
    
    
    private function cleanSearchTerms($postVal){
        $tags = explode(",", $postVal);
        $r['title'] = '';
        foreach($tags as $tag){
            $r['tags'][] = preg_replace('/[^A-Za-z0-9\-]/', '', $tag);
            $r['title'] = $r['title'] .' '.$tag;            
        }
                
        return $r;
    }
    

    
    
    
}//end class
