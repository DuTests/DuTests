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
            'Email'             =>  'varchar(60) NOT NULL',
            'Age'               =>  'int NOT NULL',
            'Password'          =>  'varchar(255)'
        ));


         $this->createTable('сompletedTests', array(
            'CompletedTestID'       =>  'pk',
            'CompletedDate'         =>  'date',
            'CorrectAnswersCount'   =>  'varchar(45)',
            'test_TestID'           =>  'int',
            'users_UsersID'         =>  'int'

        ));

          $this->createTable('tests', array(
            'testsid'                   =>  'pk',
            'testname'                  =>  'varchar(45)',
            'startdate'                 =>  'date',
            'enddate'                   =>  'date',
            'categoriesID'              =>  'int'
            ));

          $this->createTable('answer_of_test', array(
            'answerid'      =>  'pk',
            'answer'        =>  'varchar(45)',
            'testid'        =>  'int'
            ));

          $this->createTable('variant_of_answer', array(
            'variantid'         => 'pk',
            'variant'           => 'varchar(45)',
            'answerid'          =>  'int'
            ));

          $this->createTable('categories', array(
            'categoriesID'  =>  'pk',
            'name'          =>  'varchar(45)',
            'userid'        =>  'int',
            'createdin'     =>  'date',
            ));

          
          $this->addForeignKey('completed_tests_to_testi', 'сompletedTests', 'test_TestID', 'tests', 'testsid', 'CASCADE', 'RESTRICT');
          $this->addForeignKey('completed_tests_to_users', 'сompletedTests', 'users_UsersID', 'users', 'UsersID', 'CASCADE', 'RESTRICT');

          $this->addForeignKey('testi_to_kategorijas', 'tests', 'categoriesID', 'categories', 'categoriesID', 'CASCADE', 'RESTRICT');

          $this->addForeignKey('testa_jaut_to_testi', 'answer_of_test', 'testid', 'tests', 'testsid', 'CASCADE', 'RESTRICT');

          $this->addForeignKey('atbilshu_var_to_testa_jaut', 'variant_of_answer', 'answerid', 'answer_of_test', 'answerid', 'CASCADE', 'RESTRICT');

          $this->addForeignKey("userid_to_categories","categories","userid","users","UsersID","CASCADE","RESTRICT");


    }

    public function down()
    {   
        $this->execute('SET FOREIGN_KEY_CHECKS=0');
        $this->dropTable('users');
        $this->dropTable('сompletedTests');
        $this->dropTable('tests');
        $this->dropTable('answer_of_test');
        $this->dropTable('variant_of_answer');
        $this->dropTable('categories');
        $this->execute('SET FOREIGN_KEY_CHECKS=1');


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
