<?php

namespace backend\modules\local\models;

use Yii;

/**
 * This is the model class for table "localatividade".
 *
 * @property int $id
 * @property int $local_id
 * @property int $atividade_id
 *
 * @property Tipoatividade $atividade
 * @property Local $local
 */
class Localatividade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localatividade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['local_id', 'atividade_id'], 'required'],
            [['local_id', 'atividade_id'], 'integer'],
            [['atividade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoatividade::className(), 'targetAttribute' => ['atividade_id' => 'id']],
            [['local_id'], 'exist', 'skipOnError' => true, 'targetClass' => Local::className(), 'targetAttribute' => ['local_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'local_id' => Yii::t('app', 'Local ID'),
            'atividade_id' => Yii::t('app', 'Atividade ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtividade()
    {
        return $this->hasOne(Tipoatividade::className(), ['id' => 'atividade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocal()
    {
        return $this->hasOne(Local::className(), ['id' => 'local_id']);
    }

    /**
     * @inheritdoc
     * @return LocalatividadeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocalatividadeQuery(get_called_class());
    }
}
