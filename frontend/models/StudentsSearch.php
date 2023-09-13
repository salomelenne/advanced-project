<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Students;

/**
 * StudentsSearch represents the model behind the search form of `frontend\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id'], 'integer'],
            [['student_name', 'course', 'problem'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Students::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'student_id' => $this->student_id,
        ]);

        $query->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'course', $this->course])
            ->andFilterWhere(['like', 'problem', $this->problem]);

        return $dataProvider;
    }
}
