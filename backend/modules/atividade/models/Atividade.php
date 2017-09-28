<?php

namespace backend\modules\atividade\models;

use Yii;

/**
 * This is the model class for table "tipoatividade".
 *
 * @property int $id
 * @property string $atividade
 *
 * @property Localatividade[] $localatividades
 */
class Atividade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoatividade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atividade'], 'required'],
            [['atividade'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'atividade' => Yii::t('app', 'Atividade'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalatividades()
    {
        return $this->hasMany(Localatividade::className(), ['atividade_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AtividadeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AtividadeQuery(get_called_class());
    }
}
