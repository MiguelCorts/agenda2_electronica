<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeHorario;

/**
 * AgeHorarioSearch represents the model behind the search form of `app\models\AgeHorario`.
 */
class AgeHorarioSearch extends AgeHorario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hor_id', 'hor_fk_med_id'], 'integer'],
            [['hor_lunes_inicio', 'hor_lunes_fin', 'hor_martes_inicio', 'hor_martes_fin', 'hor_miercoles_inicio', 'hor_miercoles_fin', 'hor_jueves_inicio', 'hor_jueves_fin', 'hor_viernes_inicio', 'hor_viernes_fin', 'hor_sabado_inicio', 'hor_sabado_fin', 'hor_domingo_inicio', 'hor_domingo_fin'], 'safe'],
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
        $query = AgeHorario::find();

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
            'hor_id' => $this->hor_id,
            'hor_lunes_inicio' => $this->hor_lunes_inicio,
            'hor_lunes_fin' => $this->hor_lunes_fin,
            'hor_martes_inicio' => $this->hor_martes_inicio,
            'hor_martes_fin' => $this->hor_martes_fin,
            'hor_miercoles_inicio' => $this->hor_miercoles_inicio,
            'hor_miercoles_fin' => $this->hor_miercoles_fin,
            'hor_jueves_inicio' => $this->hor_jueves_inicio,
            'hor_jueves_fin' => $this->hor_jueves_fin,
            'hor_viernes_inicio' => $this->hor_viernes_inicio,
            'hor_viernes_fin' => $this->hor_viernes_fin,
            'hor_sabado_inicio' => $this->hor_sabado_inicio,
            'hor_sabado_fin' => $this->hor_sabado_fin,
            'hor_domingo_inicio' => $this->hor_domingo_inicio,
            'hor_domingo_fin' => $this->hor_domingo_fin,
            'hor_fk_med_id' => $this->hor_fk_med_id,
        ]);

        return $dataProvider;
    }
}
