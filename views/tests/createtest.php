<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\CreateTest;
?>

<div class="row">
	<div class="col-lg-5">

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'TestName'); ?>
<?= $form->field($model, 'startDate')->textInput(array('type' => 'date')); ?>
<?= $form->field($model, 'endDate')->textInput(array('type' => 'date')); ?>
<?= $form->field($model, 'category')->dropDownList( 
		ArrayHelper::map(CreateTest::find()->all(), 'categoryId', 'category'), ['prompt' => 'Please enter category']) ?>
<?= $form->field($model, 'minPercent'); ?>
<?= $form->field($model, 'selectQuestions'); ?>

<div class="form-group">
	<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

	</div>
</div>
