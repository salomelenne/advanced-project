<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $student_id
 * @property string $student_name
 * @property string $course
 * @property string $problem
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_name', 'course', 'problem'], 'required'],
            [['problem'], 'string'],
            [['student_name', 'course'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'student_name' => 'Student Name',
            'course' => 'Course',
            'problem' => 'Problem',
        ];
    }
}
