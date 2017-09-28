<?php

namespace backend\modules\veiculos\models;

use Yii;

/**
 * This is the model class for table "veiculos".
 *
 * @property int $id
 * @property string $placa
 * @property string $marca
 * @property string $modelo
 * @property string $cor
 * @property int $pessoa_id
 * @property int $local_id
 */
class Veiculos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'veiculos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['placa', 'marca', 'modelo', 'cor', 'pessoa_id', 'local_id'], 'required'],
            [['pessoa_id', 'local_id'], 'integer'],
            [['placa'], 'string', 'max' => 10],
            [['marca'], 'string', 'max' => 50],
            [['modelo'], 'string', 'max' => 100],
            [['cor'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'placa' => Yii::t('app', 'Placa'),
            'marca' => Yii::t('app', 'Marca'),
            'modelo' => Yii::t('app', 'Modelo'),
            'cor' => Yii::t('app', 'Cor'),
            'pessoa_id' => Yii::t('app', 'Pessoa ID'),
            'local_id' => Yii::t('app', 'Local ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return VeiculosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VeiculosQuery(get_called_class());
    }
}
