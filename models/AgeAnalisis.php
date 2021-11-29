<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_analisis".
 *
 * @property int $ana_id
 * @property string $ana_tipo
 * @property string $ana_ruta
 * @property int $ana_fk_pac_id
 *
 * @property AgePaciente $anaFkPac
 */
class AgeAnalisis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_analisis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ana_tipo', 'ana_fk_pac_id'], 'required'],
            [['ana_fk_pac_id'], 'integer'],
            [['ana_tipo'], 'string', 'max' => 45],
            [['ana_ruta'], 'string'],
            [['ana_fk_pac_id'], 'exist', 'skipOnError' => true, 'targetClass' => AgePaciente::className(), 'targetAttribute' => ['ana_fk_pac_id' => 'pac_id']],
            [['ana_ruta'], 'file', 'extensions' => 'pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ana_id' => 'ID',
            'ana_tipo' => 'Tipo',
            'ana_ruta' => 'Archivo',
            'ana_fk_pac_id' => 'Ana Fk Pac ID',
            'nombre'        => 'Nombre',
            'apellidop'     => 'Apellido Paterno',
            'apellidom'     => 'Apellido Materno',
            'peso'          => 'peso',
            'estatura'      => 'Estatura',
            'tipo'          => 'Tipo de Sangre',
            'genero'        => 'Genero'
        ];
    }

    /**
     * Gets query for [[AnaFkPac]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnaFkPac()
    {
        return $this->hasOne(AgePaciente::className(), ['pac_id' => 'ana_fk_pac_id']);
    }
    public function getNombre(){
        return $this->anaFkPac->pac_nombre;
    }
    public function getApellidop(){
        return $this->anaFkPac->pac_apellido_paterno;
    }
    public function getApellidom(){
        return $this->anaFkPac->pac_apellido_materno;
    }
    public function getPeso(){
        return $this->anaFkPac->pac_peso;
    }
    public function getEstatura(){
        return $this->anaFkPac->pac_estatura;
    }
    public function getTipo(){
        return $this->anaFkPac->pac_tipo_sangre;
    }
    public function getGenero(){
        return $this->anaFkPac->pac_genero_biologico;
    }

}
