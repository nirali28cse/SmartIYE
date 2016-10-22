<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MachineParametersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Machine Parameters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-parameters-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Machine Parameters', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
         //   'machine_id',
			[
			'header' => 'Machine',
			 'attribute' => 'machine_id',
			 'value' => 'machine.machine_name'
			 ],
            'param_name',
          //  'create_at',

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}',			
			],
        ],
    ]); ?>
</div>
