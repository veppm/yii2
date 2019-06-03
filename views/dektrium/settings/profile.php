<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $model
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php // $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<section class="content-header">
    <h1> Profile Settings</h1>
</section>
<section class="content">
    <div class="row">
    <!--  <div class="col-md-3">
            <?php //  $this->render('_menu') ?>
        </div> -->
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::encode($this->title) ?>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'profile-form',
                        'options'=>[
                            ['enctype'=>'multipart/form-data'],
                            'class' => 'form-horizontal'
                        ],
                        
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-7\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-lg-2 control-label'],
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'validateOnBlur' => false,
                    ]); ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'public_email') ?>

                    <?= $form->field($model, 'website') ?>

                    <?= $form->field($model, 'image')->fileInput() ?>

        

                    <?= $form->field($model, 'location') ?>

                    <?= $form
                        ->field($model, 'timezone')
                        ->dropDownList(
                            ArrayHelper::map(
                                Timezone::getAll(),
                                'timezone',
                                'name'
                            )
                        ); ?>

                    <?php //  $form->field($model, 'gravatar_email') ?>
                    <?php  // ->hint(Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com')) ?>
                    <?= $form->field($model, 'bio')->textarea() ?>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-7">
                            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
                            <br>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
