<?php
$form = \yii\bootstrap\ActiveForm::begin();
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php $message = Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>

<h1 class="text-center">Main config</h1>

<div class="container">
    <form class="form-inline">
        <?php echo $form->field($model, 'percent') ?>

        <?php echo \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    </form>

</div>
<?php
\yii\bootstrap\ActiveForm::end();
?>