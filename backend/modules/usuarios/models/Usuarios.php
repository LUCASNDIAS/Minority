<?php

namespace backend\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nome
 * @property string $empresa
 * @property string $login
 * @property string $senha
 * @property string $cnpj
 * @property string $apelido
 * @property string $foto
 * @property string $authkey
 * @property string $accesstoken
 * @property string $user_permissions
 * @property string $npm
 * @property string $guerra
 * @property string $pg
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'empresa', 'login', 'senha', 'cnpj', 'apelido', 'foto', 'authkey', 'accesstoken', 'user_permissions', 'npm', 'guerra', 'pg'], 'required'],
            [['nome', 'apelido', 'authkey', 'accesstoken'], 'string', 'max' => 200],
            [['empresa'], 'string', 'max' => 100],
            [['login'], 'string', 'max' => 32],
            [['senha'], 'string', 'max' => 256],
            [['cnpj'], 'string', 'max' => 15],
            [['foto', 'guerra'], 'string', 'max' => 50],
            [['user_permissions'], 'string', 'max' => 300],
            [['npm'], 'string', 'max' => 7],
            [['pg'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
            'empresa' => Yii::t('app', 'Empresa'),
            'login' => Yii::t('app', 'Login'),
            'senha' => Yii::t('app', 'Senha'),
            'cnpj' => Yii::t('app', 'Cnpj'),
            'apelido' => Yii::t('app', 'Apelido'),
            'foto' => Yii::t('app', 'Foto'),
            'authkey' => Yii::t('app', 'Authkey'),
            'accesstoken' => Yii::t('app', 'Accesstoken'),
            'user_permissions' => Yii::t('app', 'User Permissions'),
            'npm' => Yii::t('app', 'Npm'),
            'guerra' => Yii::t('app', 'Guerra'),
            'pg' => Yii::t('app', 'Pg'),
        ];
    }

    /**
     * @inheritdoc
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }
}
