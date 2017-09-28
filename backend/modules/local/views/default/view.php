<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\local\models\Local */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'dono',
            'nome',
            'cnpj',
            'end_cep',
            'end_rua',
            'end_nro',
            'end_cpl',
            'end_bairro',
            'end_cidade',
            'end_uf',
            'end_lat',
            'end_long',
            'fachada',
            'hora_inicio',
            'hora_fim',
            'cia',
            'observacoes:ntext',
        ],
    ]) ?>
    <div class="col-sm-12">
        Pessoas:
    <?php
    foreach ($model->pessoas as $pessoas) {
        echo $pessoas->nome . '<br>';
    }
    ?>
    </div>

    <div class="row">
    <?php
        $dir = Yii::getAlias('@webroot') . '/img/locais/' . $model->id . '/';
        if(is_dir($dir)) {
            $files = scandir($dir);
            unset($files[0]);
            unset($files[1]);
            foreach ($files as $img) {
                $foto = str_replace('/var/www/html', '', $dir) . $img;
                echo '<div class="col-sm-4">' . Html::img($foto, ['width' => '100%']) . '</div>';
            }
        }
    ?>
            </div>

</div>
