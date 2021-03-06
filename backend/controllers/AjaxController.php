<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Mensagens;
use backend\models\Tabelas;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use backend\models\Calculos;
use backend\models\Minutas;

class AjaxController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    'logout'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'logout'
                        ],
                        'allow' => true,
                        'roles' => [
                            '@'
                        ]
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => [
                        'post',
                        'get'
                    ]
                ]
            ]
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ]
        ];
    }

    public function actionMsgQtde()
    {
        // Verifica se foi solicitado por Ajax
        if (Yii::$app->request->isAjax) {

            // Carrega o Modelo das mensagens
            $msgNova = new Mensagens();

            // Retorna a quantidade
            return $msgNova->verificaNovas();
        }
    }

    public function actionMensagens($tipo = '')
    {
        // Verifica se foi solicitado por Ajax
        if (Yii::$app->request->isAjax) {

            // Carrega o Modelo das mensagens
            $model = new Mensagens();

            // Retorna as mensagens
            return $model->listarNovas();
        }
    }

    public function actionTabelas()
    {
        $tabelas  = new Tabelas();
        $listagem = $tabelas->listarNomes();

        return Json::encode($listagem);
    }

    public function actionTabcli($cnpj)
    {
        $cliente = new \backend\models\Clientes;
        $tabcli  = $cliente->Tabelas($cnpj);

        $tabelas = new Tabelas();
        $tab     = $tabelas->listarTabelas($tabcli);

        return $tab;
    }

    public function actionTeste()
    {
////        $tabelas = new Tabelas();
////        $listagem = $tabelas->testeAjax();
//
//        //$nomes = ArrayHelper::getColumn($listagem, 'nome');
//        //return Json::encode($nomes);
//
//        $mapa = ArrayHelper::map($listagem, 'id', 'nome');
//        return Json::encode($mapa);
        $basicos = new \backend\commands\Basicos();
        return $basicos->formataData('db', '28/01/2017');
    }

    public function actionCalculos()
    {
        //$dados = explode('&', $_POST['test']);
        $dados = $_POST['test'];
        $tipo  = $_POST['tipo'];

        $calculos     = new Calculos();
        // Tem que enviar o array com as variaveis
        $calculaFrete = $calculos->calculaFrete($tipo, $dados);
        //return Json::encode($calculaFrete);
        //return Json::encode($dados);
        //if(isset($_POST['test'])){
        //$test = explode('&', $_POST['test']);
//		}else{
        //		$test = "Ajax failed";
        //}

        return Json::encode($calculaFrete);
    }

    public function actionSql()
    {

        $minutas = new Minutas();

        $ultima = $minutas->find()
            ->select(['numero'])
            ->where([
                'dono' => \Yii::$app->user->identity['cnpj']
            ])
            ->orderBy('numero DESC')
            ->one();

        return var_dump($ultima);
    }

    public function actionLocal()
    {
        $sql = "SELECT l.id as id, l.nome as nome, l.fachada as fachada, l.end_lat as latitude, "
            . "l.end_long as longitude, p.nome as contato, t.telefone as telefone, "
            . "tl.tipo as tipo, tl.icone as icone, l.observacoes as observacoes "
            . "FROM local l "
            . "LEFT JOIN pessoas p ON p.local_id = l.id "
            . "LEFT JOIN localtipo lt ON lt.local_id = l.id "
            . "LEFT JOIN tipolocal tl ON lt.tipo_id = tl.id "
            . "LEFT JOIN telefones t ON t.local_id = l.id";
        $exec = \Yii::$app->db->createCommand($sql)->queryAll();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $exec;
    }
}