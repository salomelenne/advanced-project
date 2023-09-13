<?php

use backend\models\Po;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use kartik\grid\GridView;
use  backend\models\PoItemSearch;

/** @var yii\web\View $this */
/** @var backend\models\PoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Po', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
    'class'=>'kartik\grid\ExpandRowColumn',
    'value'=>function($model,$key,$index,$column){
        return GridView::ROW_COLLAPSED;
    },
    'detail'=>function($model,$key,$index,$column){
        $searchModel= new PoItemSearch();
        $searchModel->po_id=$model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return Yii::$app->controller->renderPartial('_poitems',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }
],        
    'po_no',
            'description:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Po $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
