<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Companies;
use backend\models\Branches;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var backend\models\Departments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'branches_branch_id')->dropDownList(
    ArrayHelper::map(branches::find()->all(),'branch_id','branch_name'),
        [
            'prompt'=>'select branch'
        ]
    ) ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'companies_company_id')->dropDownList(
        ArrayHelper::map(companies::find()->all(),'company_id','company_name'),
        [
            'prompt'=>'select company',
        ]
    ) ?>
    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => 'status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
