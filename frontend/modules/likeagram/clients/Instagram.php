<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\likeagram\clients;
use yii\authclient\OAuth2;
use yii\helpers\Url;

/**
 * Instagarm allows authentication via Instagram OAuth.
 *
 *
 * Example application configuration:
 *
 *
 * @author 
 * @since 
 */
class Instagram extends OAuth2
{
    /**
     * @inheritdoc
     */
    //public $authUrl = 'https://api.instagram.com/oauth/authorize/?client_id=%s&redirect_uri=%s&response_type=%s&scope=likes+basic';
    public $authUrl = 'https://api.instagram.com/oauth/authorize/';
    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://api.instagram.com/oauth/access_token';    
    
    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://api.instagram.com/v1';
    /**
     * @inheritdoc
     */
    public $scope = 'basic';
    
    
    
    
    /*
     * 
     *  This is most likley not set up correcttly yet!
     * 
     */
    
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'id' => 'id',     
            'bio' => 'bio',
            'username' => 'username',
        ];
    }

    
    /*
     * 
     *  Also not sure about getting the access tokent here?
     * 
     */
    protected function initUserAttributes()
    {        
        return $this->api('users/'.$this->getUserId(), 'GET');        
    }
    
    
    
    
    /**
     * @inheritdoc
     */
    /*
    protected function apiInternal($accessToken, $url, $method, array $params, array $headers)
    {
        $params['code'] = $accessToken->getToken();

        return $this->sendRequest($method, $url, $params, $headers);
    }
    */
    
    private function getUserId(){
        $userData = $this->getAccessToken()->getParam('user');                
        return $userData['id'];        
    }
    
    public function getUserFeed(){        
        return $this->api('users/self/feed', 'GET');        
    }
    
    public function getMediaRecent(){
        $userData = $this->getAccessToken()->getParam('user');                        
        return $this->api('users/'.$userData['id'].'/media/recent', 'GET');        
    }
    
    public function getMediaLiked(){        
        return $this->api('users/self/media/liked', 'GET');        
    }
    
    public function getMedia($id){        
        return $this->api('media/'.$id, 'GET');        
    }
    
    public function getPopular(){
        //$userData = $this->getAccessToken()->getParam('user');                        
        return $this->api('media/popular','GET');        
    }
    
    
    
    public function getNextPage($max_id){        
        $url = $this->apiBaseUrl.'/users/self/feed';
        
        $params = [
            'max_id' => $max_id,
            'access_token'=> $this->getAccessToken()->getToken(),
        ];        
        $response = $this->sendRequest('GET', $url ,$params);
        
        return $response;
    }
    

    
    public function getTagsMedia($tag){
          return $this->api('tags/'.$tag.'/media/recent', 'GET');        
    }
    
    
    
    
    
    
    
    
    
    /**
     * @inheritdoc
     */
    
    protected function defaultName()
    {
        return 'instagram';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return 'Instagram';
    }
}
