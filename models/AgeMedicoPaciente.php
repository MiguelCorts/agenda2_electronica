<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_medico_paciente".
 *
 * @property int $rel_id
 * @property int $rel_fk_pac_id
 * @property int $rel_fk_med_id
 * @property string|null $rel_fecha_inicio
 *
 * @property AgeCita[] $ageCitas
 * @property AgeMedico $relFkMed
 * @property AgePaciente $relFkPac
 * @property AgeProcedimiento[] $ageProcedimientos
 * @property AgeReceta[] $ageRecetas
 */
class AgeMedicoPaciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_medico_paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rel_fk_pac_id', 'rel_fk_med_id'], 'required'],
            [['rel_fk_pac_id', 'rel_fk_med_id'], 'integer'],
            [['rel_fecha_inicio'], 'safe'],
            [['rel_fk_med_id'], 'exist', 'skipOnError' => true, 'targetClass' => AgeMedico::className(), 'targetAttribute' => ['rel_fk_med_id' => 'med_id']],
            [['rel_fk_pac_id'], 'exist', 'skipOnError' => true, 'targetClass' => AgePaciente::className(), 'targetAttribute' => ['rel_fk_pac_id' => 'pac_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rel_id'           => 'Rel ID',
            'rel_fk_pac_id'    => 'Rel Fk Pac ID',
            'rel_fk_med_id'    => 'Rel Fk Med ID',
            'rel_fecha_inicio' => 'Rel Fecha Inicio',
            'nombre'           => 'Nombre',
            'nombrem'           => 'Medico',
            'apellidop'        => 'Apellido Paterno',
            'apellidomp'        => 'Apellido Paterno',
            'apellidom'        => 'Apellido Materno',
            'generob'           => 'Genero',
            'fecha'            => 'Fecha de Nacimiento',
            'foto'             => 'Foto de perfil',
            'email'            => 'Correo'
        ];
    }

    /**
     * Gets query for [[AgeCitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeCitas()
    {
        return $this->hasMany(AgeCita::className(), ['cit_fk_medico_paciente' => 'rel_id']);
    }

    /**
     * Gets query for [[RelFkMed]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelFkMed()
    {
        return $this->hasOne(AgeMedico::className(), ['med_id' => 'rel_fk_med_id']);
    }
    public function getNombrem()
    {
        return $this->relFkMed->med_nombre;
    }
    public function getApellidomp()
    {
        return $this->relFkMed->med_apellido_paterno;
    }
    /**
     * Gets query for [[RelFkPac]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelFkPac()
    {
        return $this->hasOne(AgePaciente::className(), ['pac_id' => 'rel_fk_pac_id']);
    }
    public function getNombre()
    {
        return $this->relFkPac->pac_nombre;
    }
    public function getApellidop()
    {
        return $this->relFkPac->pac_apellido_paterno;
    }
    public function getApellidom()
    {
        return $this->relFkPac->pac_apellido_materno;
    }
    public function getGenerob()
    {
        return $this->relFkPac->pac_genero_biologico;
    }
    public function getFecha()
    {
        return $this->relFkPac->pac_fecha_nacimiento;
    }
    public function getFoto()
    {
        return $this->relFkPac->pac_fotoruta;
    }
    public function getEmail()
    {
        return $this->relFkPac->correo;
    }


    /**
     * Gets query for [[AgeProcedimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeProcedimientos()
    {
        return $this->hasMany(AgeProcedimiento::className(), ['pro_fk_medico_paciente' => 'rel_id']);
    }

    /**
     * Gets query for [[AgeRecetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeRecetas()
    {
        return $this->hasMany(AgeReceta::className(), ['rec_fk_medico_paciente' => 'rel_id']);
    }
}
