<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
?>
<div class="tests-index">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Tests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'testName',
            'startDate',
            'endDate',
            'categoryId',           
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {pass}',
            'buttons' => [
                'pass' => function($url, $model) {
                    $url = \yii\helpers\Url::toRoute(['passtest']);
                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                        'title' => 'Pass test',
                        'class' => 'grid-action'
                    ]);
                }          
            ]]
        ]
    ]); 
    ?>
</div>