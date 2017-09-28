<?php

namespace backend\modules\local\controllers;

use Yii;
use backend\modules\local\models\Local;
use backend\modules\local\models\LocalSearch;
use backend\modules\pessoas\models\Pessoas;
use backend\modules\local\models\Localtipo;
use backend\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Local model.
 */
class DefaultController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Local models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new LocalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',
                [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Local model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view',
                [
                'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Local model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model         = new Local();
        $modelsPessoas = [new Pessoas];
        $modelTipo     = new Localtipo();

        if ($model->load(Yii::$app->request->post())) {

            // Carrega Modelo de tipo de local
            $modelTipo->load(Yii::$app->request->post());

            $modelsPessoas = Model::createMultiple(Pessoas::classname());
            Model::loadMultiple($modelsPessoas, Yii::$app->request->post());

            // Alterações que deveriam ser feitas na model
            $model->dono = '48BPM';

            // Valida Modelo principal (local)
            $valid = $model->validate();

            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    if ($flag = $model->save(false)) {

                        $last_id = \Yii::$app->db->getLastInsertID();

                        // Verifica se há Local / Tipo
                        $modelTipo->local_id = $last_id;
                        if ($modelTipo->tipo_id != '') {
                            $modelTipo->save(false);
                        }

                        foreach ($modelsPessoas as $indexPessoas => $modelPessoas) {
                            $modelPessoas->local_id  = $last_id;
                            $modelPessoas->dono      = '48BPM';
                            $modelPessoas->residente = '1';

                            if (!($flag2 = $modelPessoas->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag && $flag2) {
                        $transaction->commit();
                        //return var_dump('salvo');
                        //return $this->redirect(['index']);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {

                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create',
                [
                'model' => $model,
                'modelsPessoas' => $modelsPessoas,
                'modelTipo' => $modelTipo
        ]);
    }

    /**
     * Updates an existing Local model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update',
                    [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Local model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Local model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Local the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Local::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}