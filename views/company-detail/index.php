<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanyDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-detail-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'address:ntext',
            // 'city',
            //'state',
            // 'country',
            // 'pincode',
            // 'user_id',
            // 'email:email',
            // 'website',
            [
				'attribute' => 'status',
				'format' => 'raw',
				'value' => function ($model) {
					return $model->status == 0 ? "In Active" : "Active";
				},
			],	
            // 'create_at',

           // ['class' => 'yii\grid\ActionColumn'],
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}',			
			],
			
        ],
    ]); ?>
</div>
