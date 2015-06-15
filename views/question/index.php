<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
/* @var $this yii\web\View */
$this->title = 'Questions index';
?>


<?php
$form=ActiveForm::begin();
    
    echo $form->field($mod, 'category')->dropDownList( 
    ArrayHelper::map(Category::find()->all(), 'categoryId', 'category'), ['prompt' => 'Please enter category']);
                
    echo "<p>".$form->field($mod, 'question')->textArea()."</p>";

    echo "<div style='width:400px;'>";
    echo "<p><b>Answers</b><br/>";

    echo "<p><b>1. answer</b><br/>";
    echo"<p>".$form->field($mod, 'a1')->textArea()->label(false)."</p>";

    echo "<p><b>2. answer</b><br/>";
    echo"<p>".$form->field($mod, 'a2')->textArea()->label(false)."</p>"; 

    echo "<p><b>3. answer</b><br/>";
    echo"<p>".$form->field($mod, 'a3')->textArea()->label(false)."</p>";

    echo "<p><b>4. answer</b><br/>";
    echo"<p>".$form->field($mod, 'a4')->textArea()->label(false)."</p>";  
    echo "</div>"; 

    echo "<p><b>Number of correct answer:</b><br/>";
    echo "<div style='width:50px;'>";
        
        echo"<p>".$form->field($mod, 'correct')->label(false)."</p>";  
    echo "</div>"; 

    echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);
    ActiveForm::end(); 
?>