<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string $reciever_name
 * @property string $reciever_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reciever_name', 'reciever_email', 'subject', 'content', 'attachment'], 'required'],
            [['id'], 'integer'],
            [['content'], 'string'],
            [['reciever_name'], 'string', 'max' => 100],
            [['reciever_email', 'subject', 'attachment'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reciever_name' => 'Reciever Name',
            'reciever_email' => 'Reciever Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'attachment' => 'Attachment',
        ];
    }
}
