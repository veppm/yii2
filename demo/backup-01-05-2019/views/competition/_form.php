<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Competition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-form">
    <?php $form = ActiveForm::begin([
        'options'=>[
            'class' => 'form-horizontal',
        ],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-7\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],

    ]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'budget_from')->textInput() ?>

    <?= $form->field($model, 'budget_to')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-7">
            <?= Html::submitButton('Update', ['class' => 'btn btn-block btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
