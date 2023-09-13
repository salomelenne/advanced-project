<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $location_id
 * @property string $zip_code
 * @property string $city
 * @property string $province
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_id', 'zip_code', 'city', 'province'], 'required'],
            [['location_id'], 'integer'],
            [['zip_code', 'city', 'province'], 'string', 'max' => 100],
            [['location_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'zip_code' => 'Zip Code',
            'city' => 'City',
            'province' => 'Province',
        ];
    }
}
