<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "po".
 *
 * @property int $id
 * @property string $po_no
 * @property string $description
 *
 * @property PoItem[] $poItems
 */
class Po extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'po';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['po_no', 'description'], 'required'],
            [['description'], 'string'],
            [['po_no'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'po_no' => 'Po No',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[PoItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoItems()
    {
        return $this->hasMany(PoItem::class, ['po_id' => 'id']);
    }
}
