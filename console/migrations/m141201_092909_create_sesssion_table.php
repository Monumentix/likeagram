<?php
/*
 *  BSR - Add this and its corresponding config setting back into our boilerplate? 
 * 
 * 
 */

use yii\db\Schema;
use yii\db\Migration;

class m141201_092909_create_sesssion_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%session}}', [
                    'id'         => Schema::TYPE_STRING . ' NOT NULL',
                    'expire'    => Schema::TYPE_INTEGER,
                    'data'      => Schema::TYPE_BINARY,
                ]);           

                $this->addPrimaryKey('id', '{{%session}}', ['id'], true);
    }

    public function down()
    {
        $this->dropTable('{{%session}}');
    }
}
