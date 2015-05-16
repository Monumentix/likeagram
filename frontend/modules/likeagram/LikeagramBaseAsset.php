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
class LikeagramBaseAsset extends AssetBundle
{
    public $sourcePath = '@frontend/modules/likeagram/assets';
    public $js = [];
    
    public $css = [
        'likeagramBase.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
