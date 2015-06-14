<?php
use yii\helpers\Html;
?>

<!--  -->
<?php 
    use yii\widgets\ActiveForm; 
    use \yii\helpers\Url;
?>

<div>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'records_num')->textInput(['maxlength' => 2])->hint('Please, input integer number')->label('Number of Random Records:') ?>
    <?= $form->field($model, 'records_del')->checkboxList(['a' => 'Delete previous records'])->label('') ?>
    
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Insert', ['class' => 'btn btn-primary', 'name' => 'Save-button']) ?>
            <a href="<?php echo Url::to(array('site/index')); ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    
<?php ActiveForm::end(); ?>
</div>
<!--  -->