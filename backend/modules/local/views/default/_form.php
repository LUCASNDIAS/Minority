<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\ActiveForm;
use backend\assets\LocalAsset;

/* @var $this yii\web\View */
/* @var $model backend\modules\local\models\Local */
/* @var $form yii\widgets\ActiveForm */

LocalAsset::register($this);

?>

<div class="local-form">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form'
    ]); ?>

    <div class="row">
        <div class="col-sm-8"><?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'cnpj')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-sm-7"><?= $form->field($model, 'end_rua')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-1"><?= $form->field($model, 'end_nro')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-2"><?= $form->field($model, 'end_cpl')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-2"><?= $form->field($model, 'end_cep')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-sm-4"><?= $form->field($model, 'end_bairro')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'end_cidade')->dropDownList([
            'BRUMADINHO' => 'BRUMADINHO',
            'IBIRITE' => 'IBIRITE',
            'MARIO CAMPOS' => 'MARIO CAMPOS',
            'SARZEDO' => 'SARZEDO',
        ], [
            'prompt' => '-- Selecione --'
        ]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'end_uf')->textInput(['maxlength' => true, 'value' => 'MG']) ?></div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'cia')->dropDownList([
                '213 CIA' => '213 CIA',
                '214 CIA' => '214 CIA',
                '215 CIA' => '215 CIA',
                'SARZEDO' => 'SARZEDO',
                'MARIO CAMPOS' => 'MARIO CAMPOS'
            ],[
                'prompt' => '-- Selecione --'
            ]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelTipo, 'tipo_id')->dropDownList([
                '24' => 'FAZENDA'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'end_lat')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'end_long')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'hora_inicio')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'hora_fim')->textInput(['maxlength' => true]) ?></div>
    </div>
    
    <?php
    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 99, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsPessoas[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'nome',
            'cpf',
            'rg',
            'local_cargo',
            'tel1',
        ],
    ]);
    ?>

    <div class="panel panel-default">

        <div class="panel-heading">
            <i class="fa fa-road"></i> Pessoas
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Pessoa</button>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body container-items"><!-- widgetContainer -->

<?php foreach ($modelsPessoas as $index => $modelPessoas): ?>

                <div class="item panel panel-default"><!-- widgetBody -->

                    <div class="panel-heading">
                        <span class="panel-title-contato">Pessoa: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">

                        <?php
                        // necessary for update action.

                        if (!$modelPessoas->isNewRecord) {

                            echo Html::activeHiddenInput($modelPessoas,
                                "[{$index}]id");
                        }
                        ?>

                        <div class="row">

                            <div class="col-sm-4">
                                <?=
                                $form->field($modelPessoas, "[{$index}]nome")->textInput()
                                ?>
                            </div>
                            <div class="col-sm-2">
                                <?=
                                $form->field($modelPessoas, "[{$index}]cpf")->textInput()
                                ?>
                            </div>
                            <div class="col-sm-2">
                                <?=
                                $form->field($modelPessoas, "[{$index}]rg")->textInput()
                                ?>
                            </div>
                            <div class="col-sm-2">
                                <?=
                                $form->field($modelPessoas, "[{$index}]local_cargo")->textInput()
                                ?>
                            </div>
                            <div class="col-sm-2">
                                <?=
                                $form->field($modelPessoas, "[{$index}]tel1")->textInput()
                                ?>
                            </div>

                        </div>

                        
                        <!-- end:row -->
                    </div>



                </div>

<?php endforeach; ?>

        </div>

    </div>

<?php DynamicFormWidget::end(); ?>

    <!--
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>

    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    -->

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
