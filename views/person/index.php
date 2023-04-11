<?php

use app\models\Person;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PersonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Person';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'photo',
            [
                'options' => ['style' => 'width:150px;'],
                'format' => 'raw',
                'attribute' => 'photo',
                'value' => function ($model) {
                    return Html::tag('div', '', [
                        'style' => 'width:150px;height:95px;
                        background-image:url(' . $model->photoViewer . ');
                        background-size: cover;
                        background-position:center center;
                        background-repeat:no-repeat;
                        '
                    ]);
                }
            ],
            'first_name',
            'last_name',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Person $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>