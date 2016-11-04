<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Userdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userdetail-form signin" >


    <?php $form = ActiveForm::begin(); ?>
		
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?php // $form->field($model, 'activkey')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'create_at')->textInput() ?>

    <?php // $form->field($model, 'lastvisit_at')->textInput() ?>

    <?php // $form->field($model, 'superuser')->textInput() ?>

    <?php // $form->field($model, 'status')->textInput() ?>

    <?php $model->is_agree_with_terms_conditions = true; 

	 echo $form->field($model, 'is_agree_with_terms_conditions')->checkbox(['checked'=>true,'uncheck'=>'0','value'=>'1']); ?>
	

		<div class="sub_home">
			<div class="sub_home_left">
				<div class="form-group">
					<?= Html::submitButton($model->isNewRecord ? 'Sign Up' : 'Update', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
				</div>
			</div>
			<div class="sub_home_right">
				<p>Go Back to <a href="<?php echo  Yii::$app->getHomeUrl(); ?>">Home</a></p>
			</div>
			<div class="clearfix"> </div>
		</div>


    <?php ActiveForm::end(); ?>

</div>
