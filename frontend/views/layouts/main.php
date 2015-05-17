<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

use dektrium\user\widgets\Connect;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'renderInnerContainer'=>true,
                'innerContainerOptions' =>[
                    'class'=>'container-fluid',
                ],
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            
            /*
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            */
            
            $menuItems[] = [                                        
                    'label' => '<span class="glyphicon glyphicon-camera"></span> Likeagram ',
                        'items' => [
                             
                            
                            '<li class="dropdown-header">Browse:</li>',
                            [
                                'label' => '<span class="glyphicon glyphicon-user"></span> My Feed', 
                                'url' => '/likeagram/explore/feed'
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-stats"></span> Popular Now', 
                                'url' => '/likeagram/explore/popular'
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-list-alt"></span> My Groups', 
                                'url' => '#'
                            ],
                            '<li class="divider"></li>',                    
                            '<li class="dropdown-header">Discover New:</li>',
                            [
                                'label' => '<span class="glyphicon glyphicon-search"></span> Search NEW', 
                                'url' => '/likeagram/search'
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-search"></span> Search', 
                                'url' => '/likeagram/explore/search'
                            ],
                        ],
                    ];              
            
            

           
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
                //$menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];      
                $menuItems[] = ['label'=> '<span class="glyphicon glyphicon-user"></span> Login With Instagram', 'url' => '/user/social/auth?authclient=instagram'];
                
            } else {                
                $menuItems[] = [                                        
                    'label' => '<span class="glyphicon glyphicon-user"></span> My Account: (' . Yii::$app->user->identity->username . ')',
                        'items' => [
                             [
                                'label' => '<span class="glyphicon glyphicon-log-out"></span> Logout (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/user/logout'],
                                'linkOptions' => ['data-method' => 'post'],                    
                             ],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">Account Options</li>',
                            [
                                'label' => '<span class="glyphicon glyphicon-user"></span> My Profile', 
                                'url' => '/user/settings/profile'
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-cog"></span> Account Settings', 
                                'url' => '/user/settings/account'
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-thumbs-up"></span> Social Networks', 
                                'url' => '/user/settings/networks'
                            ],
                        ],
                    ];
                
            }
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            
            NavBar::end();
        ?>

        <div id="contentWrapper" class="container-fluid">
            
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <? Alert::widget()  ?>
            
                <?= $content ?>
            
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
