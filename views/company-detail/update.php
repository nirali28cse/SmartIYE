<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompanyDetail */

$this->title = 'Update Company Detail: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Company Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-detail-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
