<?php

?>

<?php $form = \yii\widgets\ActiveForm::begin()?>
<?= \yii\bootstrap\Html::beginForm('index.php?r=index/index')?>
<?= $form->field($model,'username')->textInput();?>
<?= $form->field($model,'password')->passwordInput();?>
<?= \yii\helpers\Html::submitButton('login')?>
<?php \yii\widgets\ActiveForm::end()?>



