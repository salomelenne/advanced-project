<?php
namespace backend\components;
class checkifloggedin extends \yii\base\behaviors{
    public function events(){
        return[
            \yii\web\Application::EVENT_BEFORE_REQUEST=>'checkifloggedin',
        ];
    }
    public function checkifloggedin(){
        if(\yii::$app->user->isGuest){
            echo 'you are a guest';
        }else{
            echo 'you are logged in';
        }
        die();
    }
}