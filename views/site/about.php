<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
use app\models\About;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. On this page you can see statistics of our DuTests system:
    </p>
    
    <?=  $model->users; ?>
    <?=  $model->tests; ?>
    <?=  $model->completed; ?>
    <?=  $model->categories; ?>
</div>
