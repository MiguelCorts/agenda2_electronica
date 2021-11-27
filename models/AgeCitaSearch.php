<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeCita;

/**
 * AgeCitaSearch represents the model behind the search form of `app\models\AgeCita`.
 */
class AgeCitaSearch extends AgeCita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cit_id', 'cit_fk_medico_paciente', 'cit_estatus'], 'integer'],
            [['cit_fecha', 'cit_hora', 'cit_motivo', 'cit_diagnostico'], 'safe'],
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
        $query = AgeCita::find();

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
            'cit_id' => $this->cit_id,
            'cit_fecha' => $this->cit_fecha,
            'cit_hora' => $this->cit_hora,
            'cit_fk_medico_paciente' => $this->cit_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'cit_motivo', $this->cit_motivo])
            ->andFilterWhere(['like', 'cit_diagnostico', $this->cit_diagnostico])
            ->andFilterWhere(['like', 'cit_estatus', $this->cit_estatus]);

        return $dataProvider;
    }
    
    public function buscar($params,$id,$estatus)
    {
        $query = AgeCita::find();
        
        $query = $query->joinWith('citFkMedicoPaciente');
        $query->where(['age_medico_paciente.rel_fk_med_id' => $id,'cit_estatus' =>$estatus])->all();

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
            'cit_id' => $this->cit_id,
            'cit_fecha' => $this->cit_fecha,
            'cit_hora' => $this->cit_hora,
            'cit_fk_medico_paciente' => $this->cit_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'cit_motivo', $this->cit_motivo])
            ->andFilterWhere(['like', 'cit_diagnostico', $this->cit_diagnostico])
            ->andFilterWhere(['like', 'cit_estatus', $this->cit_estatus]);

        return $dataProvider;
    }
    public function buscar2($params,$id,$estatus)
    {
        $query = AgeCita::find();
        
        $query = $query->joinWith('citFkMedicoPaciente');
        $query->where(['age_medico_paciente.rel_fk_pac_id' => $id,'cit_estatus' =>$estatus])->all();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 4,
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
            'cit_id' => $this->cit_id,
            'cit_fecha' => $this->cit_fecha,
            'cit_hora' => $this->cit_hora,
            'cit_fk_medico_paciente' => $this->cit_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'cit_motivo', $this->cit_motivo])
            ->andFilterWhere(['like', 'cit_diagnostico', $this->cit_diagnostico])
            ->andFilterWhere(['like', 'cit_estatus', $this->cit_estatus]);

        return $dataProvider;
    }
}
