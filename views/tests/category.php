<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tests-category">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to category:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'name') ?>
    
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'Save-button']) ?>
            <a href="<?php echo Url::to(array('tests/showcategories')); ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

    
</div>
