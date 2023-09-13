<?php

use backend\modules\settings\models\Companies;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\date\DatePicker;
use widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\CompaniesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'company_id',
            'company_name',
            'company_email:email',
            'company_adress',
           
            [
                'attribute'=>'company_start_date',
                'value'=>'company_start_date',
                
                'filter'=>DatePicker::widget([
                    'model' => $searchModel, 
                    'attribute' => 'company_start_date',
                    'options' => ['placeholder' => 'Enter  company start date ...'],
                    'pluginOptions' => [
                        'autoclose' => true,        
                        'format' => 'yyyy-mm-dd'

                    ]
                ])
                    ],
            //'company_start_date',
            //'company_created_date',
            //'company_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Companies $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'company_id' => $model->company_id]);
                 }
            ],
        ],
    ]);
     ?>



</div>
