<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\PlantMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plant-master-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php $listData=ArrayHelper::map(Users::find()->where('status=1')->asArray()->all(), 'id', 'username');   	 ?>
	<?= $form->field($model, 'user_id')->dropDownList($listData, ['prompt'=>'Select User']); ?>

    <?= $form->field($model, 'plant_name')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'plant_details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
