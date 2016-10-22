<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PlantMaster;
/* @var $this yii\web\View */
/* @var $model app\models\MachineMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machine-master-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php $listData=ArrayHelper::map(PlantMaster::find()->asArray()->all(), 'id', 'plant_name');   	 ?>
	<?= $form->field($model, 'plant_id')->dropDownList($listData, ['prompt'=>'Select Plant']); ?>

    <?= $form->field($model, 'machine_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'machine_details')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
