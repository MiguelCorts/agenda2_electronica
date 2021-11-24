<?php

namespace app\models;
use webvimark\modules\UserManagement\models\User;
use Yii;

/**
 * This is the model class for table "age_medico".
 *
 * @property int $med_id
 * @property string $med_nombre
 * @property string $med_apellido_paterno
 * @property string $med_apellido_materno
 * @property string $med_fecha_nacimiento
 * @property string $med_cedula
 * @property string $med_especialidad
 * @property string $med_estatus
 * @property int $med_fk_user_id
 *
 * @property AgeHorario[] $ageHorarios
 * @property User $medFkUser
 * @property AgeMedicoPaciente[] $ageMedicoPacientes
 */
class AgeMedico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['med_nombre', 'med_apellido_paterno', 'med_apellido_materno', 'med_fecha_nacimiento', 'med_cedula', 'med_especialidad', 'med_fk_user_id'], 'required'],
            [['med_fecha_nacimiento'], 'safe'],
            [['med_fk_user_id'], 'integer'],
            [['med_nombre', 'med_apellido_paterno', 'med_apellido_materno', 'med_cedula', 'med_especialidad', 'med_estatus'], 'string', 'max' => 45],
            [['med_fk_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['med_fk_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'med_id' => 'ID',
            'med_nombre' => 'Nombre',
            'med_apellido_paterno' => 'Apellido Paterno',
            'med_apellido_materno' => 'Apellido Materno',
            'med_fecha_nacimiento' => 'Fecha Nacimiento',
            'med_cedula' => 'Cedula',
            'med_especialidad' => 'Especialidad',
            'med_estatus' => 'Estatus',
            'med_fk_user_id' => 'Med Fk User ID',
            'lunes'          => 'Lunes',
            'martes'         => 'Martes',
            'miercoles'      => 'Miercoles',
            'jueves'         => 'Jueves',
            'viernes'        => 'Viernes',
            'sabado'         => 'Sabado',
            'domingo'        => 'Domingo',
            'lunesf'          => 'Lunes',
            'martesf'         => 'Martes',
            'miercolesf'      => 'Miercoles',
            'juevesf'         => 'Jueves',
            'viernesf'        => 'Viernes',
            'sabadof'         => 'Sabado',
            'domingof'        => 'Domingo',
        ];
    }

    /**
     * Gets query for [[AgeHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeHorarios()
    {
        return $this->hasMany(AgeHorario::className(), ['hor_fk_med_id' => 'med_id']);
    }
    public function getAgeHorarioss()
    {
        return $this->hasOne(AgeHorario::className(), ['hor_fk_med_id'=>'med_id']);
    }
    public function getLunes(){
      return $this->ageHorarioss->hor_lunes_inicio;
    }
    public function getLunesf(){
      return $this->ageHorarioss->hor_lunes_fin;
    }
    public function getMartes(){
      return $this->ageHorarioss->hor_martes_inicio;
    }
    public function getMartesf(){
      return $this->ageHorarioss->hor_martes_fin;
    }
    public function getMiercoles(){
      return $this->ageHorarioss->hor_miercoles_inicio;
    }
    public function getMiercolesf(){
      return $this->ageHorarioss->hor_miercoles_fin;
    }
    public function getJueves(){
      return $this->ageHorarioss->hor_jueves_inicio;
    }
    public function getJuevesf(){
      return $this->ageHorarioss->hor_jueves_fin;
    }
    public function getViernes(){
      return $this->ageHorarioss->hor_viernes_inicio;
    }
    public function getViernesf(){
      return $this->ageHorarioss->hor_viernes_fin;
    }
    public function getSabado(){
      return $this->ageHorarioss->hor_sabado_inicio;
    }
    public function getSabadof(){
      return $this->ageHorarioss->hor_sabado_fin;
    }
    public function getDomingo(){
      return $this->ageHorarioss->hor_domingo_inicio;
    }
    public function getDomingof(){
      return $this->ageHorarioss->hor_domingo_fin;
    }
    /**
     * Gets query for [[MedFkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedFkUser()
    {
        return $this->hasOne(User::className(), ['id' => 'med_fk_user_id']);
    }

    /**
     * Gets query for [[AgeMedicoPacientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeMedicoPacientes()
    {
        return $this->hasMany(AgeMedicoPaciente::className(), ['rel_fk_med_id' => 'med_id']);
    }
}
