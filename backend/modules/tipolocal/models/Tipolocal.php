<?php

namespace backend\modules\tipolocal\models;

use Yii;

/**
 * This is the model class for table "tipolocal".
 *
 * @property int $id
 * @property string $tipo
 * @property string $icone
 *
 * @property Localtipo[] $localtipos
 */
class Tipolocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipolocal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'icone'], 'required'],
            [['tipo', 'icone'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'icone' => 'Icone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocaltipos()
    {
        return $this->hasMany(Localtipo::className(), ['tipo_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TipolocalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipolocalQuery(get_called_class());
    }
}
