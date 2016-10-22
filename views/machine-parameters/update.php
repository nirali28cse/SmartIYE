<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MachineParameters */

$this->title = 'Update Machine Parameters: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Machine Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="machine-parameters-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
