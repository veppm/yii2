<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('user', 'Account settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content-header">
    <h1> Account Settings</h1>
</section>
<section class="content">
    <div class="row">
     <!--  <div class="col-md-3">
     <?php //  $this->render('_menu') ?>
    </div> -->
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'account-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-7\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-lg-2 control-label'],
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                    ]); ?>

                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'new_password')->passwordInput() ?>
                    <hr/>
                    <?= $form->field($model, 'current_password')->passwordInput() ?>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-7">
                            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <?php if ($model->module->enableAccountDelete): ?>
               <!--  <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php //  Yii::t('user', 'Delete account') ?></h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php // Yii::t('user', 'Once you delete your account, there is no going back') ?>.
                            <?php // Yii::t('user', 'It will be deleted forever') ?>.
                            <?php // Yii::t('user', 'Please be certain') ?>.
                        </p>
                        <?php /* Html::a(Yii::t('user', 'Delete account'), ['delete'], [
                            'class' => 'btn btn-danger',
                            'data-method' => 'post',
                            'data-confirm' => Yii::t('user', 'Are you sure? There is no going back'),
                        ]) */ ?>
                    </div>
                </div> -->
            <?php endif ?>
        </div>
    </div>
</section>