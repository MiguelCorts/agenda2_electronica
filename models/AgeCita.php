<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_cita".
 *
 * @property int $cit_id
 * @property string|null $cit_fecha
 * @property string|null $cit_hora
 * @property string $cit_motivo
 * @property string|null $cit_diagnostico
 * @property string $cit_estatus
 * @property int $cit_fk_medico_paciente
 *
 * @property AgeMedicoPaciente $citFkMedicoPaciente
 */
class AgeCita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_cita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cit_fecha', 'cit_hora'], 'safe'],
            [['cit_motivo', 'cit_estatus', 'cit_fk_medico_paciente'], 'required'],
            [['cit_motivo', 'cit_diagnostico'], 'string'],
            [['cit_fk_medico_paciente','cit_estatus'], 'integer'],
            [['cit_fk_medico_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => AgeMedicoPaciente::className(), 'targetAttribute' => ['cit_fk_medico_paciente' => 'rel_id']],
            [['cit_estatus'], 'exist', 'skipOnError' => true, 'targetClass' => AgeEstatus::className(), 'targetAttribute' => ['cit_estatus' => 'est_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cit_id'                 => 'ID',
            'cit_fecha'              => 'Fecha',
            'cit_hora'               => 'Hora',
            'cit_motivo'             => 'Motivo',
            'cit_diagnostico'        => 'Diagnostico',
            'cit_estatus'            => 'Estatus',
            'cit_fk_medico_paciente' => 'Medico',
            'relacion'               => 'Relacion',
            'estatus'                => 'Estatus',
            'nombremedico'           => 'Medico',
            'apellidopmedico'        => 'Apellido Paterno',
            'apellidommedico'        => 'Apellido Materno',
            'especialidad'           => 'Especialidad',
            'nombrep'           => 'Nombre',
            'apellidopp'        => 'Apellido Paterno',
            'apellidopm'        => 'Apellido Materno',
            'genero'            => 'Genero',
        ];
    }

    /**
     * Gets query for [[CitFkMedicoPaciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCitFkMedicoPaciente()
    {
        return $this->hasOne(AgeMedicoPaciente::className(), ['rel_id' => 'cit_fk_medico_paciente']);
    }
    public function getRelacion()
    {
        return $this->citFkMedicoPaciente->rel_fk_med_id;
    }
    public function getNombremedico()
    {
        return $this->citFkMedicoPaciente->nombrem;
    }
    public function getApellidopmedico()
    {
        return $this->citFkMedicoPaciente->apellidomp;
    } 
    public function getApellidommedico()
    {
        return $this->citFkMedicoPaciente->apellidomm;
    }
    public function getEspecialidad()
    {
        return $this->citFkMedicoPaciente->especialidad;
    }
    public function getNombrep()
    {
        return $this->citFkMedicoPaciente->nombre;
    }
    
    public function getApellidopp()
    {
        return $this->citFkMedicoPaciente->apellidop;
    }
    public function getApellidopm()
    {
        return $this->citFkMedicoPaciente->apellidom;
    }
    public function getGenero()
    {
        return $this->citFkMedicoPaciente->generob;
    }
    public function getCitEstatus()
    {
        return $this->hasOne(AgeEstatus::className(), ['est_id' => 'cit_estatus']);
    }
    public function getEstatus()
    {
        return $this->citEstatus->est_nombre;
    }
}
