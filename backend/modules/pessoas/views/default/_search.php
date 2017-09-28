<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pessoas\models\PessoasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pessoas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dono') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cpf') ?>

    <?= $form->field($model, 'rg') ?>

    <?php // echo $form->field($model, 'end_cep') ?>

    <?php // echo $form->field($model, 'end_rua') ?>

    <?php // echo $form->field($model, 'end_nro') ?>

    <?php // echo $form->field($model, 'end_cpl') ?>

    <?php // echo $form->field($model, 'end_bairro') ?>

    <?php // echo $form->field($model, 'end_cidade') ?>

    <?php // echo $form->field($model, 'end_uf') ?>

    <?php // echo $form->field($model, 'residente') ?>

    <?php // echo $form->field($model, 'local_id') ?>

    <?php // echo $form->field($model, 'local_cargo') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
