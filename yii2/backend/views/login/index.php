<?php

?>

<?php $form = \yii\widgets\ActiveForm::begin(['action'=>'login/login'])?>
<?= \yii\bootstrap\Html::beginForm('index.php?r=login/login','post')?>
<?= $form->field($model,'name')->textInput();?>
<?= $form->field($model,'pwd')->passwordInput();?>
<?= \yii\bootstrap\Html::submitButton('login');?>
<?php \yii\widgets\ActiveForm::end()?>
