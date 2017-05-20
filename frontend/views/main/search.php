<?php
$form = \yii\bootstrap\ActiveForm::begin();
?>
<h1 class="text-center">Product info</h1>

<div class="container">
    <form class="form-inline">
        <?php echo $form->field($model, 'link') ?>

        <?php echo \yii\helpers\Html::submitButton('Get info', ['class'=>'btn btn-success']) ?>
        
    </form>
    <br>

    <h1 class="text-center">Result</h1>
    <ul  class="list-group">
        <li class="list-group-item">Price</li>
        <li class="list-group-item">Shipment</li>
        <li class="list-group-item"> Our percent</li>
        <li class="list-group-item list-group-item-info">Summary</li>
    </ul>

    <button type="submit" class="btn btn-default">Save info</button>
</div>
<?php
\yii\bootstrap\ActiveForm::end();
?>