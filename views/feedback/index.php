<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Feedback;
/* @var $this yii\web\View */
$this->title = 'Feedback';
?>

    <div style="width:400px;"  >
        
    </div>

	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'comment')->textArea(); ?>
        
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
    <? ActiveForm::end(); ?>
    

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Feedback</th>
                </tr>

                <?php 
                foreach ($model->feedbacks as $feedback) {
					echo '<tr><td>'.$feedback->date."</td>";
					echo '<td>'.$feedback->comment."</td></tr>";
					}   
                ?>

            </table>
        </div>
    </div>

	<div class="form-group">
	<?php
		
	?>	
	</div>
