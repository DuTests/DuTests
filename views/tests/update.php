<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Tests */

$this->title = 'Update Tests: ' . ' ' . $model->testId;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->testId, 'url' => ['view', 'id' => $model->testId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tests-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <a href="<?php echo Url::to(array('category/index')); ?>" class="btn btn-danger">Cancel</a>

</div>
