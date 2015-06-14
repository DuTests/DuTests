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
        This is the About page. You may modify the following file to customize its content:
    </p>
    Users count: <?=$userscount?></br>
    Tests count: <?=$testscount?></br>
    <code><?= __FILE__ ?></code>
</div>
