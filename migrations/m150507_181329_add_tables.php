<?php

use yii\db\Schema;
use yii\db\Migration;

class m150507_181329_add_tables extends Migration
{
    public function up()
    {
        $this->createTable('users', array(
            'userId'             =>  'pk',
            'firstName'          =>  'varchar(45) NOT NULL',
            'lastName'           =>  'varchar(45) NOT NULL',
            'gender'             =>  'tinyint(1) NOT NULL',
            'registrationDate'   =>  'date',
            'username'           =>  'varchar(45) NOT NULL',
            'email'              =>  'varchar(60) NOT NULL',
            'age'                =>  'int NOT NULL',
            'password'           =>  'varchar(255)'
        ));

        $this->createTable('completedTests', array(
            'completedId'        =>  'pk',
            'date'               =>  'date',
            'correctAnswerCount' =>  'varchar(45)',
            'testId'             =>  'int',
            'userId'             =>  'int'
        ));

        $this->createTable('tests', array(
            'testId'             =>  'pk',
            'testName'           =>  'varchar(45)',
            'startDate'          =>  'date',
            'endDate'            =>  'date',
            'categoryId'         =>  'int',
            'categoryName'       =>  'varchar(45)'
        ));

        $this->createTable('questions', array(
            'questionId'         =>  'pk',
            'question'           =>  'varchar(45)',
            'testId'             =>  'int',
            'correctAnswerId'    =>  'int'
        ));

        $this->createTable('answers', array(
            'answerId'           => 'pk',
            'answer'             => 'varchar(45)',
            'questionId'         =>  'int'
        ));

        $this->createTable('categories', array(
            'categoryId'         =>  'pk',
            'category'           =>  'varchar(45)'
        ));
        
        $this->createTable('feedback', array(
            'feedbackId'         =>  'pk',
            'userId'             =>  'int',
            'date'               =>  'date',
            'comment'            =>  'varchar(500)'
        ));

        $this->createTable('testQuestions', array(
            'id'                 =>  'pk',
            'testId'             =>  'int',
            'questionId'         =>  'int'
        ));

        $this->addForeignKey('completed_tests_to_testi', 'completedTests', 'testId', 'tests', 'testId', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('completed_tests_to_users', 'completedTests', 'userId', 'users', 'userId', 'CASCADE', 'RESTRICT');

        $this->addForeignKey('testi_to_kategorijas', 'tests', 'categoryId', 'categories', 'categoryId', 'CASCADE', 'RESTRICT');

        $this->addForeignKey('testa_jaut_to_testi', 'questions', 'testId', 'tests', 'testId', 'CASCADE', 'RESTRICT');

        $this->addForeignKey('atbilshu_var_to_testa_jaut', 'answers', 'questionId', 'questions', 'questionId', 'CASCADE', 'RESTRICT');

        $this->addForeignKey('userid_to_feedback', 'feedback', 'userId', 'users', 'userId', 'CASCADE', 'RESTRICT');

        $this->addForeignKey('testId_to_testQuestions', 'testQuestions', 'testId', 'tests', 'testId', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('questionId_to_testQuestions', 'testQuestions', 'questionId', 'questions', 'questionId', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {   
        $this->execute('SET FOREIGN_KEY_CHECKS=0');
        $this->dropTable('users');
        $this->dropTable('сompletedTests');
        $this->dropTable('tests');
        $this->dropTable('questions');
        $this->dropTable('answers');
        $this->dropTable('categories');
        $this->dropTable('feedback');
        $this->dropTable('testQuestion');
        $this->execute('SET FOREIGN_KEY_CHECKS=1');
    }
}
