<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MachineParameterTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Machine Parameter Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-parameter-transaction-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		 'rowOptions' => function ($model, $index, $widget, $grid){
			  if($model->machine_parameters_value == 	65500){
				return ['class' => 'danger'];
			  }else{
				return [];
			  }
			},
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'machine_parameters_name',
            'machine_parameters_value',

        ],
    ]); ?>
</div>
