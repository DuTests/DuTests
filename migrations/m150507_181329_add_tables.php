<?php

use yii\db\Schema;
use yii\db\Migration;

class m150507_181329_add_tables extends Migration
{
    public function up()
    {
         $this->createTable('users', array(
            'UsersID'           =>  'pk',
            'FirstName'         =>  'varchar(45) NOT NULL',
            'LastName'          =>  'varchar(45) NOT NULL',
            'Gender'            =>  'tinyint(1) NOT NULL',
            'RegistrationDate'  =>  'date',
            'Username'          =>  'varchar(45) NOT NULL',
            'Email'             =>  'varchar(60) NOT NULL'
        ));


         $this->createTable('сompletedTests', array(
            'CompletedTestID'       =>  'pk',
            'CompletedDate'         =>  'date',
            'CorrectAnswersCount'   =>  'varchar(45)',
            'test_TestID'           =>  'int',
            'users_UsersID'         =>  'int'

        ));

          $this->createTable('testi', array(
            'TestID'                    =>  'pk',
            'TestName'                  =>  'varchar(45)',
            'StartDate'                 =>  'date',
            'EndDate'                   =>  'date',
            'Kategorijas_KategorijasID' =>  'int'
            ));

          $this->createTable('testa_jaut', array(
            'JautID'        =>  'pk',
            'Jautajums'     =>  'varchar(45)',
            'testi_testiID' =>  'int'
            ));

          $this->createTable('atbilzhu_var', array(
            'VardiID'           => 'pk',
            'Variants'          => 'varchar(45)',
            'testa_jaut_JautID' =>  'int'
            ));

          $this->createTable('kategorijas', array(
            'KategorijasID'     =>  'pk',
            'CategoryName'      =>  'varchar(45)',
            'NumberOfTests'     =>  'int',
            'NumberOfQustions'  =>  'int'
            ));

          
          $this->addForeignKey('completed_tests_to_testi', 'сompletedTests', 'test_TestID', 'testi', 'TestID', 'CASCADE', 'RESTRICT');
          $this->addForeignKey('completed_tests_to_users', 'сompletedTests', 'users_UsersID', 'users', 'UsersID', 'CASCADE', 'RESTRICT');

          $this->addForeignKey('testi_to_kategorijas', 'testi', 'Kategorijas_KategorijasID', 'kategorijas', 'KategorijasID', 'CASCADE', 'RESTRICT');

          $this->addForeignKey('testa_jaut_to_testi', 'testa_jaut', 'testi_testiID', 'testi', 'TestID', 'CASCADE', 'RESTRICT');

          $this->addForeignKey('atbilshu_var_to_testa_jaut', 'atbilzhu_var', 'testa_jaut_JautID', 'testa_jaut', 'JautID', 'CASCADE', 'RESTRICT');


    }

    public function down()
    {
        $this->dropTable('users');
        $this->dropTable('completedTests');
        $this->dropTable('testi');
        $this->dropTable('testa_jaut');
        $this->dropTable('atbilzhu_var');
        $this->dropTable('kategorijas');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
