<?php

namespace app\models;
use webvimark\modules\UserManagement\models\User;

use Yii;

/**
 * This is the model class for table "age_paciente".
 *
 * @property int $pac_id
 * @property string $pac_nombre
 * @property string $pac_apellido_paterno
 * @property string $pac_apellido_materno
 * @property string $pac_fecha_nacimiento
 * @property string $pac_tipo_sangre
 * @property string $pac_antecedentes
 * @property string $pac_genero_biologico
 * @property string|null $pac_genero
 * @property float $pac_estatura
 * @property float $pac_peso
 * @property string $pac_farmaco_alergico
 * @property int $pac_fk_user_id
 *
 * @property AgeAnalisis[] $ageAnalises
 * @property AgeMedicoPaciente[] $ageMedicoPacientes
 * @property User $pacFkUser
 */
class AgePaciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pac_nombre', 'pac_apellido_paterno', 'pac_apellido_materno', 'pac_fecha_nacimiento', 'pac_tipo_sangre', 'pac_antecedentes', 'pac_genero_biologico', 'pac_estatura', 'pac_peso', 'pac_farmaco_alergico', 'pac_fk_user_id'], 'required'],
            [['pac_fecha_nacimiento'], 'safe'],
            [['pac_antecedentes', 'pac_farmaco_alergico'], 'string'],
            [['pac_estatura', 'pac_peso'], 'number'],
            [['pac_fk_user_id'], 'integer'],
            [['pac_nombre', 'pac_apellido_paterno', 'pac_apellido_materno', 'pac_tipo_sangre', 'pac_genero_biologico', 'pac_genero'], 'string', 'max' => 45],
            [['pac_fotoruta'], 'string', 'max' => 255],
            [['pac_fk_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['pac_fk_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pac_id' => 'ID',
            'pac_fotoruta' => 'Foto de Perfil',
            'pac_nombre' => 'Nombre',
            'pac_apellido_paterno' => 'Apellido Paterno',
            'pac_apellido_materno' => 'Apellido Materno',
            'pac_fecha_nacimiento' => 'Fecha Nacimiento',
            'pac_tipo_sangre' => 'Tipo de Sangre',
            'pac_antecedentes' => 'Antecedentes',
            'pac_genero_biologico' => 'Genero Biologico',
            'pac_genero' => 'Genero',
            'pac_estatura' => 'Estatura',
            'pac_peso' => 'Peso',
            'pac_farmaco_alergico' => 'Farmaco Alergico',
            'pac_fk_user_id' => 'Pac Fk User ID',
             'username'      =>  'Usuario',
             'correo'        =>  'Correo'
        ];
    }

    /**
     * Gets query for [[AgeAnalises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeAnalises()
    {
        return $this->hasMany(AgeAnalisis::className(), ['ana_fk_pac_id' => 'pac_id']);
    }

    /**
     * Gets query for [[AgeMedicoPacientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeMedicoPacientes()
    {
        return $this->hasMany(AgeMedicoPaciente::className(), ['rel_fk_pac_id' => 'pac_id']);
    }

    /**
     * Gets query for [[PacFkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPacFkUser()
    {
        return $this->hasOne(User::className(), ['id' => 'pac_fk_user_id']);
    }

    public function getUsername(){
        return $this->pacFkUser->username;
    }
    public function getCorreo(){
        return $this->pacFkUser->email;
    }
}
