<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MachineMaster;
/* @var $this yii\web\View */
/* @var $model app\models\MachineParameters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machine-parameters-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php $listData=ArrayHelper::map(MachineMaster::find()->asArray()->all(), 'id', 'machine_name');   	 ?>
	<?= $form->field($model, 'machine_id')->dropDownList($listData, ['prompt'=>'Select Machine']); ?>
	
	
    <?= $form->field($model, 'param_name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
