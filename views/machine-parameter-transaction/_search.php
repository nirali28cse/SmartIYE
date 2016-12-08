<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MachineParameterTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machine-parameter-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'machine_parameters_id') ?>

    <?= $form->field($model, 'machine_parameter_tag_id') ?>

    <?= $form->field($model, 'machine_parameters_name') ?>

    <?= $form->field($model, 'machine_parameters_value') ?>

    <?php // echo $form->field($model, 'machine_id') ?>

    <?php // echo $form->field($model, 'entry_timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
