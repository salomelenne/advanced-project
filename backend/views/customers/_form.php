<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\arrayHelper;
use backend\models\Locations;

/** @var yii\web\View $this */
/** @var backend\models\Customers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

     
    <?= $form->field($model, 'zip_code')->dropDownList(
        arrayHelper::map(Locations::find()->all(),'location_id','zip_code'),
        ['prompt'=>'select zip code','id'=>'zipCode']
    ) 
    
    ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $script = <<< Js
//here you write your all javascript
$('#zipCode').change(function(){
    var zipId = $(this).val();
    alert(zipCode);
    $.get('index.php?r=locations/get-city-province',{ zipId :zipId}, function(data){
      var data=  $.parseJSON(data);
        $('#customers-city').attr('value',data.city);
        $('#customers-province').attr('value',data.province);

    });
});
Js;
$this->registerJs($script);
?>