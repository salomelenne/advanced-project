<?php

use yii\helpers\Html;
use yii\helpers\arrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Companies;

/** @var yii\web\View $this */
/** @var backend\models\Branches $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    
    <?= $form->field($model, 'companies_company_id')->dropDownList(
        arrayHelper::map(Companies::find()->all(),'company_id','company_name'),
        ['prompt'=>'select company']
    ) 
    
    ?>


    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_adress')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => 'status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
