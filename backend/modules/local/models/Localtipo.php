<?php

namespace backend\modules\local\models;

use Yii;
use backend\modules\tipolocal\models\Tipolocal;

/**
 * This is the model class for table "localtipo".
 *
 * @property int $id
 * @property int $local_id
 * @property int $tipo_id
 *
 * @property Local $local
 * @property Tipolocal $tipo
 */
class Localtipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localtipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['local_id', 'tipo_id'], 'required'],
            [['local_id', 'tipo_id'], 'integer'],
            [['local_id'], 'exist', 'skipOnError' => true, 'targetClass' => Local::className(), 'targetAttribute' => ['local_id' => 'id']],
            [['tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipolocal::className(), 'targetAttribute' => ['tipo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'local_id' => Yii::t('app', 'Local'),
            'tipo_id' => Yii::t('app', 'Tipo de local'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocal()
    {
        return $this->hasOne(Local::className(), ['id' => 'local_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipolocal::className(), ['id' => 'tipo_id']);
    }

    /**
     * @inheritdoc
     * @return LocaltipoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocaltipoQuery(get_called_class());
    }
}
