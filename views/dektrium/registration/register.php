<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var yii\widgets\ActiveForm    $form
 */


$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php // $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<div class="row multi-page">
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?php  // $form->field($model, 'first_name') ?>
                <?php  // $form->field($model, 'last_name') ?>
                <?= $form->field($model, 'email',['enableAjaxValidation' => true]) ?>
                <?= $form->field($model, 'username',['enableAjaxValidation' => true])->textInput(['autofocus' => true]) ?>
                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?php // echo  $form->field($model, 'password_repeat')->passwordInput() ?>
                <?php endif ?>
                <?= $form->field($model, 'role')->dropDownList(['2'=>'Client', '3'=>'Architect']) ?>
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block custome-btn']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/login']) ?>
        </p>
    </div>
</div>
