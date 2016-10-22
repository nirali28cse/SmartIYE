<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Userdetail */

$this->title = 'Update Userdetail: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Userdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
