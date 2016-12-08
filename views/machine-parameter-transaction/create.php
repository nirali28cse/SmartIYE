<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MachineParameterTransaction */

$this->title = 'Create Machine Parameter Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Machine Parameter Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-parameter-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
