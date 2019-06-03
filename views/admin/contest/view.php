<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Competition */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Competitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<section class="content-header">
    <h1> Comptition Detail <?= Html::a('Go Back', ['index'], ['class' => 'btn btn-info', 'style'=>'float:right;']) ?> </h1> 
</section>
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',
                        // 'user_id',
                        'title',
                        'body:ntext',
                        [
                            'attribute' => 'created_at',
                            'value' => function ($model) {
                                if (extension_loaded('intl')) {
                                    return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
                                } else {
                                    return date('Y-m-d G:i:s', $model->created_at);
                                }
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value' => function ($model) {
                                if (extension_loaded('intl')) {
                                    return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->updated_at]);
                                } else {
                                    return date('Y-m-d G:i:s', $model->updated_at);
                                }
                            },
                        ],

                        [
                            'attribute' => 'budgets',
                            'value' => function ($model) {
                                return $model->budget_from.'-'.$model->budget_to;
                            },
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</section>