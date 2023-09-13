<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_adress
 * @property string $company_created_date
 * @property string $company_status
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'company_name', 'company_email', 'company_adress', 'company_created_date', 'company_status'], 'required'],
            [['company_id'], 'integer'],
            [['company_created_date'], 'safe'],
            [['company_status'], 'string'],
            [['file'],'file'],
            [['company_name', 'logo','company_email', 'company_adress'], 'string', 'max' => 100],
            [['company_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_adress' => 'Company Adress',
            'company_created_date' => 'Company Created Date',
            'company_status' => 'Company Status',
            'file'=>'logo',
        ];
    }

    /**
     * Gets query for [[Branches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::class, ['companies_company_id' => 'company_id']);
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::class, ['companies_company_id' => 'company_id']);
    }
}
