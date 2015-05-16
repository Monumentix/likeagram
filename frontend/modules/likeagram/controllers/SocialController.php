<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\likeagram\controllers;

//use dektrium\user\controllers\SecurityController as BaseSocialController;


use dektrium\user\Module;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\authclient\ClientInterface;




/**
 * Controller that manages user authentication process.
 *
 */
class SocialController extends Controller    //   \dektrium\user\controllers\SecurityController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['auth'],
                        'roles' => ['@','?']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['disconnect'],
                        'roles' => ['?']
                    ],
                ]
            ],
            /*
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post']
                ]
            ]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'authenticate'],
            ]
        ];
    }

    
    
    
    /**
     * Logs the user in if this social account has been already used. Otherwise shows registration form.
     *
     * @param  ClientInterface $client
     * @return \yii\web\Response
     */
    public function authenticate(ClientInterface $client)
    {      
        $attributes = $client->getUserAttributes();
        $provider   = $client->getId();                   
        $clientId =  $attributes['data']['id'];
        
        
        //User has been authenicated, lets decide what to do with there account now
        if(null === ($userId = \Yii::$app->user->id)){
            //No logged in useer proceeed by just adding them then redirect for signup
            if (null === ($account = $this->module->manager->findAccount($provider, $clientId))) {
                $account = $this->module->manager->createAccount([
                    'provider'   => $provider,
                    'client_id'  => $clientId,
                    'data'       => json_encode($attributes)
                ]);
                $account->save(false);
            }
            
            if (null === ($user = $account->user)) {
                $this->action->successUrl = Url::to(['/user/registration/connect', 'account_id' => $account->id]);
            } else {
                \Yii::$app->user->login($user, $this->module->rememberFor);
            }
            
        }else{
            //Loggeed in user proceed with connectin there account
             if (null === ($account = $this->module->manager->findAccount($provider, $clientId))) {
                $account = $this->module->manager->createAccount([
                    'provider'  => $provider,
                    'client_id' => $clientId,
                    'data'      => json_encode($attributes),
                    'user_id'   => \Yii::$app->user->id
                ]);
                $account->save(false);
               \Yii::$app->session->setFlash('success', \Yii::t('user', 'Instagram Account has been successfully connected'));
            } else {
                \Yii::$app->session->setFlash('error', \Yii::t('user', 'This account has already been connected to another user'));
            }

            $this->action->successUrl = Url::to(['/user/settings/networks']);            
            
        }//end if/else                

    }//end connect/registeer
    
        
}
