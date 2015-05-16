<?php
/*
 *  BSR: 12/5/2014
 * 
 *  I commented this part out, as it looked like flash messages were already being rendered globally in my layouts,
 *  Since this is something i wanted to keep, i felt it easier to comment out the lone view then, overwrite each
 *  view's call to this file
 * 
 *  I've left the code intact for later reference/inspection 
 * 
*/
?>

<!--
<div class="row">
    <div class="col-xs-12 flash-msg">
        <?php // foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
            <?php // if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                <div class="alert alert-<?// = $type ?>">
                    <?//= $message ?>
                </div>
            <?php // endif ?>
        <?php // endforeach ?>
    </div>
</div>
-->