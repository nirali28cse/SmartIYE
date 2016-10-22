<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MachineMaster */

$this->title = 'Update Machine : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Machine Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="machine-master-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
