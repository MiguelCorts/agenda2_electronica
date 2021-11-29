<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeProcedimiento;

/**
 * AgeProcedimientoSearch represents the model behind the search form of `app\models\AgeProcedimiento`.
 */
class AgeProcedimientoSearch extends AgeProcedimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'pro_fk_medico_paciente', 'pro_consentimiento_ruta', 'pro_pg_disponible', 'pro_estatus'], 'integer'],
            [['pro_tipo', 'pro_fecha', 'pro_hora', 'pro_hospital', 'pro_sala', 'pro_descripcion'], 'safe'],
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
        $query = AgeProcedimiento::find();
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
            'pro_id' => $this->pro_id,
            'pro_fecha' => $this->pro_fecha,
            'pro_hora' => $this->pro_hora,
            'pro_fk_medico_paciente' => $this->pro_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'pro_tipo', $this->pro_tipo])
            ->andFilterWhere(['like', 'pro_hospital', $this->pro_hospital])
            ->andFilterWhere(['like', 'pro_sala', $this->pro_sala])
            ->andFilterWhere(['like', 'pro_pg_disponible', $this->pro_pg_disponible])
            ->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_consentimiento_ruta', $this->pro_consentimiento_ruta])
            ->andFilterWhere(['like', 'pro_estatus', $this->pro_estatus]);

        return $dataProvider;
    }
    public function buscar($params,$id,$estatus)
    {
        $query = AgeProcedimiento::find();
        $query = $query->joinWith('proFkMedicoPaciente');
        $query->where(['age_medico_paciente.rel_fk_med_id' => $id,'pro_estatus' =>$estatus])->all();
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
            'pro_id' => $this->pro_id,
            'pro_fecha' => $this->pro_fecha,
            'pro_hora' => $this->pro_hora,
            'pro_fk_medico_paciente' => $this->pro_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'pro_tipo', $this->pro_tipo])
            ->andFilterWhere(['like', 'pro_hospital', $this->pro_hospital])
            ->andFilterWhere(['like', 'pro_sala', $this->pro_sala])
            ->andFilterWhere(['like', 'pro_pg_disponible', $this->pro_pg_disponible])
            ->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_consentimiento_ruta', $this->pro_consentimiento_ruta])
            ->andFilterWhere(['like', 'pro_estatus', $this->pro_estatus]);

        return $dataProvider;
    }
    public function buscar2($params,$id,$estatus)
    {
        $query = AgeProcedimiento::find();
        $query = $query->joinWith('proFkMedicoPaciente');
        $query->where(['age_medico_paciente.rel_fk_pac_id' => $id,'pro_estatus' =>$estatus])->all();
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
            'pro_id' => $this->pro_id,
            'pro_fecha' => $this->pro_fecha,
            'pro_hora' => $this->pro_hora,
            'pro_fk_medico_paciente' => $this->pro_fk_medico_paciente,
        ]);

        $query->andFilterWhere(['like', 'pro_tipo', $this->pro_tipo])
            ->andFilterWhere(['like', 'pro_hospital', $this->pro_hospital])
            ->andFilterWhere(['like', 'pro_sala', $this->pro_sala])
            ->andFilterWhere(['like', 'pro_pg_disponible', $this->pro_pg_disponible])
            ->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_consentimiento_ruta', $this->pro_consentimiento_ruta])
            ->andFilterWhere(['like', 'pro_estatus', $this->pro_estatus]);

        return $dataProvider;
    }

}
