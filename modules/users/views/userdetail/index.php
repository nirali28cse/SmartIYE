<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\users\models\UserdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Userdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            'email:email',
            'name',
            // 'auth_key',
            // 'create_at',
            // 'lastvisit_at',
            // 'superuser',
            // 'status',
            // 'is_agree_with_terms_conditions',
            // 'is_employeer',
            // 'is_job_seeker',
            // 'is_seller',
            // 'is_advertiser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
