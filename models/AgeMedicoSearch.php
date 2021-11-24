<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeMedico;

/**
 * AgeMedicoSearch represents the model behind the search form of `app\models\AgeMedico`.
 */
class AgeMedicoSearch extends AgeMedico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['med_id', 'med_fk_user_id'], 'integer'],
            [['med_nombre', 'med_apellido_paterno', 'med_apellido_materno', 'med_fecha_nacimiento', 'med_cedula', 'med_especialidad', 'med_estatus'], 'safe'],
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
        $query = AgeMedico::find();

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
            'med_id' => $this->med_id,
            'med_fecha_nacimiento' => $this->med_fecha_nacimiento,
            'med_fk_user_id' => $this->med_fk_user_id,
        ]);

        $query->andFilterWhere(['like', 'med_nombre', $this->med_nombre])
            ->andFilterWhere(['like', 'med_apellido_paterno', $this->med_apellido_paterno])
            ->andFilterWhere(['like', 'med_apellido_materno', $this->med_apellido_materno])
            ->andFilterWhere(['like', 'med_cedula', $this->med_cedula])
            ->andFilterWhere(['like', 'med_especialidad', $this->med_especialidad])
            ->andFilterWhere(['like', 'med_estatus', $this->med_estatus]);

        return $dataProvider;
    }
}
