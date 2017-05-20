<?php
$form = \yii\bootstrap\ActiveForm::begin();
?>
<?php if (Yii::$app->session->hasFlash('save')): ?>
    <?php
    $message = Yii::$app->session->getFlash('save');
    echo \yii\bootstrap\Alert::widget([
        'options' => ['class' => 'alert-info'],
        'body' => $message
    ]);
    ?>
<?php endif; ?>
<h1 class="text-center">Product info</h1>

<div class="container">
    <form class="form-inline">
        <?php echo $form->field($model, 'link') ?>

<?php echo \yii\helpers\Html::submitButton('Get info', ['class' => 'btn btn-success']) ?>

    </form>
    <br>

    <h1 class="text-center">Result</h1>

    <table class="table table-bordered table-hover text-center">
        <tr>
            <th>Price <?php echo "($model->val)"; ?></th>
            <th>Our percent (%)</th>
            <th>Summary <?php echo "($model->val)"; ?></th>
        </tr> 
        <tr>
            <td><?php echo $model->price ?></td>
            <?php echo \yii\helpers\Html::hiddenInput('price_value', $model->price); ?>

            <td><?php echo isset($percent->percent) ? $percent->percent : 0; ?></td>
<?php echo \yii\helpers\Html::hiddenInput('price_name', $model->val); ?>
            <td><?php echo $sum = ($model->price + (isset($percent->percent) ? $percent->percent : 0) * ($model->price) / 100); ?></td>
        </tr> 
    </table>

<?php echo \yii\helpers\Html::submitButton('Save info', ['class' => 'btn btn-info', 'name' => 'save', 'value' => 'save']) ?>

</div>
<?php
\yii\bootstrap\ActiveForm::end();
?>