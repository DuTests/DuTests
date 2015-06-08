<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
	<div class="col-lg-5">

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'TestName'); ?>
<?= $form->field($model, 'startDate')->textInput(array('type' => 'date')); ?>
<?= $form->field($model, 'endDate')->textInput(array('type' => 'date')); ?>
<?= $form->field($model, 'category')->dropDownList( [
		'a' => 'Value a',
		'b' => 'Value b',
		'c' => 'Value c',
		'd' => 'Value d' ]); ?>
<?= $form->field($model, 'minPercent'); ?>
<?= $form->field($model, 'selectQuestions'); ?>

<div class="form-group">
	<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

	</div>
</div>
