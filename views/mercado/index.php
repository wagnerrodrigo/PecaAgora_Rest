<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MercadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mercados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mercado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mercado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'category',
            'price',
            'availableQuantity',
            'thumbnail',
            'permalink',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, app\models\Mercado $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
