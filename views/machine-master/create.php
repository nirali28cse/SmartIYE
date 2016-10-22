<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MachineMaster */

$this->title = 'Create Machine';
$this->params['breadcrumbs'][] = ['label' => 'Machine Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-master-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
