<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Userdetail */

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = ['label' => 'Userdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Smart</b>IYE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
			
			<div class="sign-up">
				<h3><?php echo $this->title; ?><span class="greencolor"> Here</span></h3>
				<p class="creating">Fill the form for sign up.</p>
			</div>
									
			<?= $this->render('_form', [
				'model' => $model,
			]) ?>
			
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

