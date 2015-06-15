<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\CreateTest;
use app\models\Category;
?>

<?php
$this->title = 'Сreate Test';

if(Yii::$app->session->getFlash('error'))
{
	echo Yii::$app->session->getFlash('error');
}
?>

<div class="row">
	<div class="col-lg-5">

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'testName'); ?>
<?= $form->field($model, 'startDate')->textInput(array('type' => 'date')); ?>
<?= $form->field($model, 'endDate')->textInput(array('type' => 'date')); ?>
<?= $form->field($model, 'category')->dropDownList( 
		ArrayHelper::map(Category::find()->all(), 'categoryId', 'category'), ['prompt' => 'Please enter category']) ?>
<?= $form->field($model, 'minPercent'); ?>
<?= $form->field($model, 'selectQuestions'); ?>

<div class="form-group">
	<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'Save-button']) ?>
</div>
<?php ActiveForm::end(); ?>
	</div>
</div>
