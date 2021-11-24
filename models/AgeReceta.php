<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_receta".
 *
 * @property int $rec_id
 * @property string $rec_fecha
 * @property string $rec_medicamentos
 * @property string $rec_indicaciones
 * @property int $rec_fk_medico_paciente
 *
 * @property AgeMedicoPaciente $recFkMedicoPaciente
 */
class AgeReceta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_receta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_fecha', 'rec_medicamentos', 'rec_indicaciones', 'rec_fk_medico_paciente'], 'required'],
            [['rec_fecha'], 'safe'],
            [['rec_medicamentos', 'rec_indicaciones'], 'string'],
            [['rec_fk_medico_paciente'], 'integer'],
            [['rec_fk_medico_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => AgeMedicoPaciente::className(), 'targetAttribute' => ['rec_fk_medico_paciente' => 'rel_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_id' => 'ID',
            'rec_fecha' => 'Fecha',
            'rec_medicamentos' => 'Medicamentos',
            'rec_indicaciones' => 'Indicaciones',
            'rec_fk_medico_paciente' => 'Rec Fk Medico Paciente',
            'relacion'               => 'Relacion',
        ];
    }

    /**
     * Gets query for [[RecFkMedicoPaciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecFkMedicoPaciente()
    {
        return $this->hasOne(AgeMedicoPaciente::className(), ['rel_id' => 'rec_fk_medico_paciente']);
    }
    public function getRelacion()
    {
        return "Dr.".$this->recFkMedicoPaciente->nombrem." ".$this->recFkMedicoPaciente->apellidomp;
    }

}
