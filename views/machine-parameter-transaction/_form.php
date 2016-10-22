<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MachineParameters;
use app\models\MachineMaster;

/* @var $this yii\web\View */
/* @var $model app\models\MachineParameterTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machine-parameter-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php $listData=ArrayHelper::map(MachineParameters::find()->asArray()->all(), 'id', 'param_name');   	 ?>
	<?= $form->field($model, 'machine_parameters_id')->dropDownList($listData, ['prompt'=>'Select Machine Params']); ?>

	<?php $listData1=ArrayHelper::map(MachineMaster::find()->asArray()->all(), 'id', 'machine_name');   	 ?>
	<?= $form->field($model, 'machine_id')->dropDownList($listData1, ['prompt'=>'Select Machine']); ?>

    <?= $form->field($model, 'machine_parameters_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'machine_parameters_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
