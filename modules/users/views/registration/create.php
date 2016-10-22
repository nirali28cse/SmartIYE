<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Userdetail */

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = ['label' => 'Userdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userdetail-create">

		<div id="page-wrapper" class="sign-in-wrapper">
					<div class="graphs">

					<div class="zorens-form">

							<div class="signin">
							<div class="sign-up">
								<h1><?php echo $this->title; ?><span class="greencolor"> Here</span></h1>
								<p class="creating">Fill the form for sign up.</p>
							</div>
							
							<?= $this->render('_form', [
								'model' => $model,
							]) ?>
							
							</div>
						</div>
					</div>
			</div>
			
			
			

	
	
</div>
