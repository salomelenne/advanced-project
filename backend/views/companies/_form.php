<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Companies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_adress')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>


    <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => 'status']) ?>


    <?= $form->field($branch, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($branch, 'branch_adress')->textInput(['maxlength' => true]) ?>


    <?= $form->field($branch, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => 'status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
