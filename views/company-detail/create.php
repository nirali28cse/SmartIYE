<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CompanyDetail */

$this->title = 'Create Company Detail';
$this->params['breadcrumbs'][] = ['label' => 'Company Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-detail-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
