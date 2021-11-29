<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_procedimiento".
 *
 * @property int $pro_id
 * @property string $pro_tipo
 * @property string $pro_fecha
 * @property string $pro_hora
 * @property string $pro_hospital
 * @property string $pro_sala
 * @property string $pro_pg_disponible
 * @property string $pro_descripcion
 * @property string|null $pro_consentimiento_ruta
 * @property string $pro_estatus
 * @property int $pro_fk_medico_paciente
 *
 * @property AgeMedicoPaciente $proFkMedicoPaciente
 */
class AgeProcedimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_procedimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_tipo', 'pro_fecha', 'pro_hora', 'pro_hospital', 'pro_sala', 'pro_pg_disponible', 'pro_descripcion', 'pro_fk_medico_paciente', 'pro_pg_disponible'], 'required'],
            [['pro_fecha', 'pro_hora'], 'safe'],
            [['pro_descripcion'], 'string'],
            [['pro_fk_medico_paciente','pro_pg_disponible','pro_estatus'], 'integer'],
            [['pro_tipo', 'pro_hospital', 'pro_sala'], 'string', 'max' => 45],
            [['pro_consentimiento_ruta'], 'string', 'max' => 80],
            [['pro_fk_medico_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => AgeMedicoPaciente::className(), 'targetAttribute' => ['pro_fk_medico_paciente' => 'rel_id']],
            [['pro_estatus'], 'exist', 'skipOnError' => true, 'targetClass' => AgeEstatus::className(), 'targetAttribute' => ['pro_estatus' => 'est_id']],
            [['pro_consentimiento_ruta'], 'file', 'extensions' => 'pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id'                  => 'ID',
            'pro_tipo'                => 'Tipo',
            'pro_fecha'               => 'Fecha',
            'pro_hora'                => 'Hora',
            'pro_hospital'            => 'Hospital',
            'pro_sala'                => 'Sala',
            'pro_pg_disponible'       => 'Paquete Globular Disponible',
            'pro_descripcion'         => 'Descripcion',
            'pro_consentimiento_ruta' => 'Archivo de Consentimiento',
            'pro_estatus'             => 'Estatus',
            'estatus'                 => 'Estatus',
            'pro_fk_medico_paciente'  => 'Pro Fk Medico Paciente',
        ];
    }

    /**
     * Gets query for [[ProFkMedicoPaciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFkMedicoPaciente()
    {
        return $this->hasOne(AgeMedicoPaciente::className(), ['rel_id' => 'pro_fk_medico_paciente']);
    }
    public function getNombremedico()
    {
        return $this->proFkMedicoPaciente->nombrem;
    }
    public function getApellidopmedico()
    {
        return $this->proFkMedicoPaciente->apellidomp;
    } 
    public function getApellidommedico()
    {
        return $this->proFkMedicoPaciente->apellidomm;
    }
    public function getEspecialidad()
    {
        return $this->proFkMedicoPaciente->especialidad;
    }
    public function getProEstatus()
    {
        return $this->hasOne(AgeEstatus::className(), ['est_id' => 'pro_estatus']);
    }
    public function getEstatus()
    {
        return $this->proEstatus->est_nombre;
    }
}
