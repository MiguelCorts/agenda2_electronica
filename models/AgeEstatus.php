<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age_estatus".
 *
 * @property int $est_id
 * @property string $est_nombre
 */
class AgeEstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_estatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_nombre'], 'required'],
            [['est_nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_id' => 'Est ID',
            'est_nombre' => 'Est Nombre',
        ];
    }
}
