<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlantMaster */

$this->title = 'Update Plant : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plant Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plant-master-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
