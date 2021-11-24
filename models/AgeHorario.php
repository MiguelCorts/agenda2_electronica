<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_horario".
 *
 * @property int $hor_id
 * @property string $hor_lunes_inicio
 * @property string $hor_lunes_fin
 * @property string $hor_martes_inicio
 * @property string $hor_martes_fin
 * @property string $hor_miercoles_inicio
 * @property string $hor_miercoles_fin
 * @property string $hor_jueves_inicio
 * @property string $hor_jueves_fin
 * @property string $hor_viernes_inicio
 * @property string $hor_viernes_fin
 * @property string $hor_sabado_inicio
 * @property string $hor_sabado_fin
 * @property string $hor_domingo_inicio
 * @property string $hor_domingo_fin
 * @property int $hor_fk_med_id
 *
 * @property AgeMedico $horFkMed
 */
class AgeHorario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hor_lunes_inicio', 'hor_lunes_fin', 'hor_martes_inicio', 'hor_martes_fin', 'hor_miercoles_inicio', 'hor_miercoles_fin', 'hor_jueves_inicio', 'hor_jueves_fin', 'hor_viernes_inicio', 'hor_viernes_fin', 'hor_sabado_inicio', 'hor_sabado_fin', 'hor_domingo_inicio', 'hor_domingo_fin', 'hor_fk_med_id'], 'required'],
            [['hor_lunes_inicio', 'hor_lunes_fin', 'hor_martes_inicio', 'hor_martes_fin', 'hor_miercoles_inicio', 'hor_miercoles_fin', 'hor_jueves_inicio', 'hor_jueves_fin', 'hor_viernes_inicio', 'hor_viernes_fin', 'hor_sabado_inicio', 'hor_sabado_fin', 'hor_domingo_inicio', 'hor_domingo_fin'], 'safe'],
            [['hor_fk_med_id'], 'integer'],
            [['hor_fk_med_id'], 'exist', 'skipOnError' => true, 'targetClass' => AgeMedico::className(), 'targetAttribute' => ['hor_fk_med_id' => 'med_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hor_id' => 'ID',
            'hor_lunes_inicio' => 'Lunes Inicio',
            'hor_lunes_fin' => 'Lunes Fin',
            'hor_martes_inicio' => 'Martes Inicio',
            'hor_martes_fin' => 'HMartes Fin',
            'hor_miercoles_inicio' => 'Miercoles Inicio',
            'hor_miercoles_fin' => 'Miercoles Fin',
            'hor_jueves_inicio' => 'Jueves Inicio',
            'hor_jueves_fin' => 'Jueves Fin',
            'hor_viernes_inicio' => 'Viernes Inicio',
            'hor_viernes_fin' => 'Viernes Fin',
            'hor_sabado_inicio' => 'Sabado Inicio',
            'hor_sabado_fin' => 'Sabado Fin',
            'hor_domingo_inicio' => 'Domingo Inicio',
            'hor_domingo_fin' => 'Domingo Fin',
            'hor_fk_med_id' => 'Hor Fk Med ID',
        ];
    }

    /**
     * Gets query for [[HorFkMed]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorFkMed()
    {
        return $this->hasOne(AgeMedico::className(), ['med_id' => 'hor_fk_med_id']);
    }
}
