<?php

use yii\db\Schema;
use yii\db\Migration;

class m150430_134839_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('users', array(
            'id'        =>      'pk',
            'name'      =>      'varchar(40) NOT NULL',
            'surname'   =>      'varchar(40) NOT NULL',
            'nickname'  =>      'varchar(40) NOT NULL',
            'email'     =>      'varchar(40) NOT NULL',
            'password'  =>      'varchar(255) NOT NULL',
            'age'       =>      'smallint(2) NOT NULL',
            ));
    }

    public function down()
    {
        //echo "m150430_134839_create_users_table cannot be reverted.\n";
        $this->dropTable('users');
        //return false;
    }
}
