<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\UserdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>
	
    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'email') ?>


    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'lastvisit_at') ?>

    <?php // echo $form->field($model, 'superuser') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_agree_with_terms_conditions') ?>

    <?php // echo $form->field($model, 'is_employeer') ?>

    <?php // echo $form->field($model, 'is_job_seeker') ?>

    <?php // echo $form->field($model, 'is_seller') ?>

    <?php // echo $form->field($model, 'is_advertiser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
