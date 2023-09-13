<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\EmailsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="emails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reciever_name') ?>

    <?= $form->field($model, 'reciever_email') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'attachment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
