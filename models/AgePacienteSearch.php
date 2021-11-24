<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgePaciente;

/**
 * AgePacienteSearch represents the model behind the search form of `app\models\AgePaciente`.
 */
class AgePacienteSearch extends AgePaciente
{   public $username;
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['pac_id', 'pac_fk_user_id'], 'integer'],
            [['pac_nombre', 'pac_apellido_paterno', 'pac_apellido_materno', 'pac_fecha_nacimiento', 'pac_tipo_sangre', 'pac_antecedentes', 'pac_genero_biologico', 'pac_genero', 'pac_farmaco_alergico'], 'safe'],
            [['pac_estatura', 'pac_peso'], 'number'],
            [['username'],'safe'],
            [['pac_fotoruta'],'safe'],
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
        $query = AgePaciente::find();
        $query = $query->joinwith('pacFkUser');
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
            'pac_id' => $this->pac_id,
            'pac_fecha_nacimiento' => $this->pac_fecha_nacimiento,
            'pac_estatura' => $this->pac_estatura,
            'pac_peso' => $this->pac_peso,
            'pac_fk_user_id' => $this->pac_fk_user_id,

        ]);

        $query->andFilterWhere(['like', 'pac_nombre', $this->pac_nombre])
            ->andFilterWhere(['like', 'pac_apellido_paterno', $this->pac_apellido_paterno])
            ->andFilterWhere(['like', 'pac_fotoruta', $this->pac_fotoruta])
            ->andFilterWhere(['like', 'pac_apellido_materno', $this->pac_apellido_materno])
            ->andFilterWhere(['like', 'pac_tipo_sangre', $this->pac_tipo_sangre])
            ->andFilterWhere(['like', 'pac_antecedentes', $this->pac_antecedentes])
            ->andFilterWhere(['like', 'pac_genero_biologico', $this->pac_genero_biologico])
            ->andFilterWhere(['like', 'pac_genero', $this->pac_genero])
            ->andFilterWhere(['like', 'pac_farmaco_alergico', $this->pac_farmaco_alergico])
            ->andFilterWhere(['like', 'user.username', $this->username]);

        return $dataProvider;
    }
}
