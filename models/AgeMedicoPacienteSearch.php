<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgeMedicoPaciente;

/**
 * AgeMedicoPacienteSearch represents the model behind the search form of `app\models\AgeMedicoPaciente`.
 */
class AgeMedicoPacienteSearch extends AgeMedicoPaciente
{   public $nombre;
    public $apellidop;
    public $apellidom;
    public $generob;
    public $fecha;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rel_id', 'rel_fk_pac_id', 'rel_fk_med_id'], 'integer'],
            [['rel_fecha_inicio'], 'safe'],
            [['nombre','apellidop','apellidom','generob','fecha'], 'safe'],
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
        $query = AgeMedicoPaciente::find();

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
            'rel_id' => $this->rel_id,
            'rel_fk_pac_id' => $this->rel_fk_pac_id,
            'rel_fk_med_id' => $this->rel_fk_med_id,
            'rel_fecha_inicio' => $this->rel_fecha_inicio,
        ]);

        return $dataProvider;
    }
    public function buscar($params,$id)
    {
        $query = AgeMedicoPaciente::find();
        $query->where(['rel_fk_med_id' => $id])->all();
        // add conditions that should always apply here
        $query = $query->joinwith('relFkPac');
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
            'rel_id' => $this->rel_id,
            'rel_fk_pac_id' => $this->rel_fk_pac_id,
            'rel_fk_med_id' => $this->rel_fk_med_id,
            'rel_fecha_inicio' => $this->rel_fecha_inicio,
        ]);
        $query->andFilterWhere(['like', 'age_paciente.pac_nombre', $this->nombre])
            ->andFilterWhere(['like', 'pac_apellido_paterno', $this->apellidop])
            ->andFilterWhere(['like', 'pac_apellido_materno', $this->apellidom])
            ->andFilterWhere(['like', 'pac_genero_biologico', $this->generob])
            ->andFilterWhere(['like', 'pac_fecha_nacimiento', $this->fecha]);

        return $dataProvider;
    }
}
