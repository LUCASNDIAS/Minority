<?php

namespace backend\modules\local\models;

use Yii;
use backend\modules\pessoas\models\Pessoas;

/**
 * This is the model class for table "local".
 *
 * @property int $id
 * @property string $dono
 * @property string $nome
 * @property string $cnpj
 * @property string $end_cep
 * @property string $end_rua
 * @property string $end_nro
 * @property string $end_cpl
 * @property string $end_bairro
 * @property string $end_cidade
 * @property string $end_uf
 * @property string $end_lat
 * @property string $end_long
 * @property string $fachada
 * @property string $hora_inicio
 * @property string $hora_fim
 * @property string $cia
 * @property string $observacoes
 *
 * @property Localatividade[] $localatividades
 * @property Localtipo[] $localtipos
 * @property Pessoas[] $pessoas
 */
class Local extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'end_lat', 'end_long', 'cia'], 'required'],
            [['observacoes'], 'string'],
            [['dono', 'end_bairro'], 'string', 'max' => 50],
            [['nome', 'end_rua', 'end_cidade'], 'string', 'max' => 100],
            [['cnpj'], 'string', 'max' => 15],
            [['end_cep', 'end_nro'], 'string', 'max' => 10],
            [['end_cpl', 'end_lat', 'end_long', 'cia'], 'string', 'max' => 20],
            [['end_uf'], 'string', 'max' => 2],
            [['fachada'], 'string', 'max' => 150],
            [['hora_inicio', 'hora_fim'], 'string', 'max' => 5],
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
            'cnpj' => Yii::t('app', 'CNPJ'),
            'end_cep' => Yii::t('app', 'CEP'),
            'end_rua' => Yii::t('app', 'Logradouro'),
            'end_nro' => Yii::t('app', 'Núm.'),
            'end_cpl' => Yii::t('app', 'Compl.'),
            'end_bairro' => Yii::t('app', 'Bairro'),
            'end_cidade' => Yii::t('app', 'Município'),
            'end_uf' => Yii::t('app', 'UF'),
            'end_lat' => Yii::t('app', 'Latitude'),
            'end_long' => Yii::t('app', 'Logitude'),
            'fachada' => Yii::t('app', 'Fachada'),
            'hora_inicio' => Yii::t('app', 'Início Ativ.'),
            'hora_fim' => Yii::t('app', 'Fim Ativ.'),
            'cia' => Yii::t('app', 'Cia / Pel'),
            'observacoes' => Yii::t('app', 'Observações'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalatividades()
    {
        return $this->hasMany(Localatividade::className(), ['local_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocaltipos()
    {
        return $this->hasMany(Localtipo::className(), ['local_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(Pessoas::className(), ['local_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return LocalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocalQuery(get_called_class());
    }
}
