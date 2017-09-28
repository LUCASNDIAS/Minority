<?php

namespace backend\modules\telefones\models;

use Yii;

/**
 * This is the model class for table "telefones".
 *
 * @property int $id
 * @property string $telefone
 * @property int $local_id
 * @property int $pessoa_id
 */
class Telefones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'telefones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telefone', 'local_id', 'pessoa_id'], 'required'],
            [['local_id', 'pessoa_id'], 'integer'],
            [['telefone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'telefone' => Yii::t('app', 'Telefone'),
            'local_id' => Yii::t('app', 'Local ID'),
            'pessoa_id' => Yii::t('app', 'Pessoa ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return TelefonesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TelefonesQuery(get_called_class());
    }
}
