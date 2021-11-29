<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeReceta;

/**
 * AgeRecetaSearch represents the model behind the search form of `app\models\AgeReceta`.
 */
class AgeRecetaSearch extends AgeReceta
{   //public $relacion;
    /**
     * {@inheritdoc}
     */
    public function rules()
    { 
        return [
            [['rec_id', 'rec_fk_medico_paciente'], 'integer'],
            [['rec_fecha', 'rec_medicamentos', 'rec_indicaciones'], 'safe'],
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
        $query = AgeReceta::find();

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
            'rec_id' => $this->rec_id,
            'rec_fecha' => $this->rec_fecha,
            'rec_fk_medico_paciente' => $this->rec_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'rec_medicamentos', $this->rec_medicamentos])
            ->andFilterWhere(['like', 'rec_indicaciones', $this->rec_indicaciones]);

        return $dataProvider;
    }
    public function buscar($params,$id)
    {
        $query = AgeReceta::find();
        $query = $query->joinWith('recFkMedicoPaciente');
        $query->where(['age_medico_paciente.rel_fk_pac_id' => $id])->all();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
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
            'rec_id' => $this->rec_id,
            'rec_fecha' => $this->rec_fecha,
            'rec_fk_medico_paciente' => $this->rec_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'rec_medicamentos', $this->rec_medicamentos])
            ->andFilterWhere(['like', 'rec_indicaciones', $this->rec_indicaciones]);
            //->andFilterWhere(['like', 'age_medico_paciente.relacion', $this->relacion]);


        return $dataProvider;
    }
}
