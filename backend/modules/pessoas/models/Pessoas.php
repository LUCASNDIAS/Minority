<?php

namespace backend\modules\pessoas\models;

use Yii;
use backend\modules\local\models\Local;

/**
 * This is the model class for table "pessoas".
 *
 * @property int $id
 * @property string $dono
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property string $end_cep
 * @property string $end_rua
 * @property string $end_nro
 * @property string $end_cpl
 * @property string $end_bairro
 * @property string $end_cidade
 * @property string $end_uf
 * @property string $residente
 * @property int $local_id
 * @property string $local_cargo
 * @property string $foto
 *
 * @property Local $local
 */
class Pessoas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pessoas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'local_cargo'], 'required'],
            [['local_id'], 'integer'],
            [['dono', 'end_bairro', 'local_cargo'], 'string', 'max' => 50],
            [['nome'], 'string', 'max' => 200],
            [['cpf', 'rg'], 'string', 'max' => 15],
            [['tel1', 'tel2'], 'string', 'max' => 11],
            [['end_cep', 'end_nro'], 'string', 'max' => 10],
            [['end_rua', 'end_cidade'], 'string', 'max' => 100],
            [['end_cpl'], 'string', 'max' => 20],
            [['end_uf'], 'string', 'max' => 2],
            [['residente'], 'string', 'max' => 1],
            [['foto'], 'string', 'max' => 150],
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
            'dono' => Yii::t('app', 'Dono'),
            'nome' => Yii::t('app', 'Nome'),
            'cpf' => Yii::t('app', 'CPF'),
            'rg' => Yii::t('app', 'RG'),
            'end_cep' => Yii::t('app', 'End Cep'),
            'end_rua' => Yii::t('app', 'End Rua'),
            'end_nro' => Yii::t('app', 'End Nro'),
            'end_cpl' => Yii::t('app', 'End Cpl'),
            'end_bairro' => Yii::t('app', 'End Bairro'),
            'end_cidade' => Yii::t('app', 'End Cidade'),
            'end_uf' => Yii::t('app', 'End Uf'),
            'residente' => Yii::t('app', 'Residente'),
            'local_id' => Yii::t('app', 'Local ID'),
            'local_cargo' => Yii::t('app', 'Cargo'),
            'foto' => Yii::t('app', 'Foto'),
            'tel1' => Yii::t('app', 'Telefone'),
            'tel2' => Yii::t('app', 'Telefone'),
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
     * @inheritdoc
     * @return PessoasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PessoasQuery(get_called_class());
    }
}
