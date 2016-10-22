<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PlantMaster */

$this->title = 'Create Plant';
$this->params['breadcrumbs'][] = ['label' => 'Plant Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plant-master-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
