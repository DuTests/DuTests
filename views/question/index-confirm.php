<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Questions index';
?>
<h2>Data added successfully</h2>


<?php
	echo "<p><b>Question: </b>".Html::encode($mod->question)."</b></p>";
	
	echo "<p><b>Answers:</b></p>";

		echo "<p><b>1. answer: </b>";
		echo Html::encode($mod->a1)."</p>";

		echo "<p><b>2. answer: </b>";
		echo Html::encode($mod->a2)."</p>";

		echo "<p><b>3. answer: </b>";
		echo Html::encode($mod->a3)."</p>";

		echo "<p><b>4. answer: </b>";
		echo Html::encode($mod->a4)."</p>";
	
		echo "<p><b>Correct answer: </b>";
		echo Html::encode($c)."</p>";

?>
