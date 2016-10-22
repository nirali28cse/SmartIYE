<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MachineParameterTransaction */

$this->title = 'Update Machine Parameter Transaction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Machine Parameter Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="machine-parameter-transaction-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
