<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MachineParameterTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machine-parameter-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'machine_parameters_id')->textInput() ?>

    <?= $form->field($model, 'machine_parameters_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'machine_parameters_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'machine_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
