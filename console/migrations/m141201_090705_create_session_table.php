<?php

use yii\db\Schema;
use yii\db\Migration;

class m141201_090705_create_session_table extends Migration
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
        if($this->dropTable('{{%session}}') == true){
            return true;
        }else{
            return false;
        };

        
    }
}
