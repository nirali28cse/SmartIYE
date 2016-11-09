<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlantMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plant-master-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           //  'id',
            'plant_name',
            'plant_details:ntext',
          //  'create_at',

			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}',			
			],
        ],
    ]); ?>
</div>
