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
    <?php echo Yii::$app->request->url;// echo $this->render('_search', ['model' => $searchModel]); ?>

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>