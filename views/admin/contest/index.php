<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Contest List';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1> <?= $this->title?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <p><?php //  Html::a('Create Competition', ['create'], ['class' => 'btn btn-success']) ?></p>
                <?php // echo "<pre>"; print_r(\Yii::$app->getBaseUrl()); exit; ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout'       => "{items}\n{pager}",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        // 'id',
                        'order_id',
                        'contest_title',
                        'design_package',
                        'contest_duration:ntext',
                        'approximate_budjet',
                        [
                            'attribute'=>'payment_status',
                            'filter'=>["pending"=>"Pending","success"=>"Success"],
                            'value' => function ($model) {
                                if($model->payment_status!='success'){
                                    return '<div class="text-center">
                                        <span class="btn btn-xs btn-danger">' . Yii::t('user', 'Pending') . '</span>
                                    </div>';
                                } else {
                                    return '<div class="text-center">
                                        <span class="btn btn-xs btn-success">' . Yii::t('user', 'Success') . '</span>
                                    </div>';
                                }   
                            },
                            'format' => 'raw',

                        ],

                        'payment_date',
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

                        /* 
                           'about_family',
                            'living_spaces',
                            'name',
                            'email',
                        */

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{delete}{proposal}{fullBrief}',
                            'buttons' => [
                                'delete' => function ($url, $model, $key) {
                                    //var_dump(\Yii::$app->user->identity->isAdmin);
                                        return '
                                    <a data-method="POST" data-confirm="' . Yii::t('user', 'Are you sure to delete contest, if you delete this contest then all records related to this contest will be delete?') . '" href="' . Url::to(['delete', 'id' => $model->id]) . '">
                                    <span title="' . Yii::t('user', 'Delete') . '" class="glyphicon glyphicon-trash">
                                    </span> </a>';
                                },

                                'proposal' => function ($url, $model, $key) {
                                    //var_dump(\Yii::$app->user->identity->isAdmin);
                                        return '
                                    <a href="' . Url::to(['/admin/contest/proposal-list', 'contest-proposal' => $model->id]) . '">
                                    <span title="' . Yii::t('user', 'Proposal List') . '" class="text-success glyphicon glyphicon-list-alt">
                                    </span> </a>';
                                },

                                'fullBrief' => function ($url, $model, $key) {
                                    //var_dump(\Yii::$app->user->identity->isAdmin);
                                        return '
                                    <a href="' . Url::to(['/admin/contest/contest-information', 'contest-proposal' => $model->id]) . '">
                                    <span title="' . Yii::t('user', 'Contest Full Brief') . '" class="text-success glyphicon glyphicon-plus">
                                    </span> </a>';
                                }
                            ], 
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</section>
