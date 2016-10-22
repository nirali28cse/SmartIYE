<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MachineMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Machine';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-master-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Machine', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
			[
			'header' => 'Plant',
			 'attribute' => 'plant_id',
			 'value' => 'plant.plant_name'
			 ],
			 
            'machine_name',
            'machine_details:ntext',
         //   'create_at',

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}',			
			],
        ],
    ]); ?>
</div>
