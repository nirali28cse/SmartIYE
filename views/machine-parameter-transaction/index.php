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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Machine Parameter Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'machine_parameters_id',
			[
			'header' => 'Machine Params',
			 'attribute' => 'machine_parameters_id',
			 'value' => 'machineParameters.param_name'
			 ],
		//	'machine_id',
			[
			'header' => 'Machine',
			 'attribute' => 'machine_id',
			 'value' => 'machine.machine_name'
			 ],
            'machine_parameters_name',
            'machine_parameters_value',
            'create_date',
            'create_time',
           

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}',			
			],
        ],
    ]); ?>
</div>
