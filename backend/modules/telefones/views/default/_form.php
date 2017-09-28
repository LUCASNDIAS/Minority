<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\telefones\models\Telefones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_id')->textInput() ?>

    <?= $form->field($model, 'pessoa_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
