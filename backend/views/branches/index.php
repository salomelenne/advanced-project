<?php

use backend\models\Branches;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\modal;


/** @var yii\web\View $this */
/** @var backend\models\BranchesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php /* Modal::begin([
        'header'=>'<h4>Branches</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    */?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->branch_status=='inactive'){
                return ['class'=>'danger'];
            }
            else if($model->branch_status=='active'){
                return ['class'=>'succes'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name',
            ],

            //'branch_id',
            //'companiesCompany.company_name',
            'branch_name',
            'branch_adress',
            'branch_created_date',
            'branch_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Branches $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'branch_id' => $model->branch_id]);
                 }
            ],
        ],
    ]); ?>

<?php Pjax::end(); ?>

</div>
