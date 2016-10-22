<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MachineParameters */

$this->title = 'Create Machine Parameters';
$this->params['breadcrumbs'][] = ['label' => 'Machine Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-parameters-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
