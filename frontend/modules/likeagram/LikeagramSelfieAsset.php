<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

// namespace yii\authclient\widgets;
namespace app\modules\likeagram;

use yii\web\AssetBundle;

/**
 * AuthChoiceAsset is an asset bundle for [[AuthChoice]] widget.
 *
 * @author Paul Klimov <klimov.paul@gmail.com>
 * @since 2.0
 */
class LikeagramSelfieAsset extends AssetBundle
{
    public $sourcePath = '@frontend/modules/likeagram/assets';
    public $js = [        
        //'classie.js',                
        //'AnimOnScroll.js',
        //'jquery.nanoscroller.min.js',                   
        'isotope.pkgd.min.js',        
        'imagesloaded.js',             
        //'likeagramMediaGrid.js',    
        'likeagramSelfieGrid.js',    
        
    ];
    public $css = [
        'likeagramModule.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
