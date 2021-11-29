<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeAnalisis;

/**
 * AgeAnalisisSearch represents the model behind the search form of `app\models\AgeAnalisis`.
 */
class AgeAnalisisSearch extends AgeAnalisis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ana_id', 'ana_fk_pac_id'], 'integer'],
            [['ana_tipo', 'ana_ruta'], 'safe'],
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
        $query = AgeAnalisis::find();

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
            'ana_id' => $this->ana_id,
            'ana_fk_pac_id' => $this->ana_fk_pac_id,
        ]);

        $query->andFilterWhere(['like', 'ana_tipo', $this->ana_tipo])
            ->andFilterWhere(['like', 'ana_ruta', $this->ana_ruta]);

        return $dataProvider;
    }
    public function buscar($params,$id)
    {
        $query = AgeAnalisis::find();
        $query->where(['ana_fk_pac_id' => $id])->all();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
                ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ana_id' => $this->ana_id,
            'ana_fk_pac_id' => $this->ana_fk_pac_id,
        ]);

        $query->andFilterWhere(['like', 'ana_tipo', $this->ana_tipo])
            ->andFilterWhere(['like', 'ana_ruta', $this->ana_ruta]);

        return $dataProvider;
    }
}
