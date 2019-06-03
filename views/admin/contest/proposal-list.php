<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Proposal List';
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
                        [
                           'attribute'=>'contest_title',
                            'value' => function ($model) {
                               return '
                                    <a  href="' . Url::to(['admin/contest/contest-information', 'contest-proposal' => $model['id']]). '">'.ucfirst(Yii::t('user', $model['contest_title'])).'</a>';
                            },
                            'format' => 'raw', 
                        ],
                        [
                            'attribute' => 'user_id',
                            'label' => 'Username',
                            'value' => 'username'
                        ],
                        [
                            'label' => 'Email',
                            'attribute' => 'email',
                            'value' => 'email'
                        ],
                        'comment',
                        //$ext = pathinfo($path, PATHINFO_EXTENSION);
                        [
                           'label'     => 'Design File',
                           'attribute' =>'design_files',
                            'value'    => function ($model) {
                                return '<a href="'.Url::base(true)."/proposal-files/".$model["design_files"].'" target="_blank"><img src="'.Url::base(true)."/proposal-files/".$model["design_files"].'" width="200px" height="60px"></a>';
                                },
                            'format' => 'raw', 
                        ],

                        [
                            'label' => 'Won Status',
                            'attribute'=>'user_won',
                            'filter'=>["0"=>"Not Won", "1" => "Won"],
                            'value' => function ($model) {
                                if($model['user_won']=='1'){
                                    return '<div class="text-center">
                                        <span class="btn btn-xs btn-success">' . Yii::t('user', 'Won') . '</span>
                                    </div>';
                                } else {
                                    return '<div class="text-center">
                                         <span class="btn btn-xs btn-danger">' . Yii::t('user', 'Not Won') . '</span>
                                    </div>';
                                }   
                            },
                            'format' => 'raw',

                        ],




                        [
                            'attribute' => 'won_date',
                            'value' => function ($model) {
                                if (extension_loaded('intl')) {
                                    return ($model['won_date']) ? Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model['won_date']]) : 'Not Set';
                                } else {
                                    return date('Y-m-d G:i:s', $model['won_date']);
                                }
                            },
                        ],

                        [
                            'attribute' => 'created_at',
                            'value' => function ($model) {
                                if (extension_loaded('intl')) {
                                    return ($model['created_at']) ? Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model['created_at']]) : 'Not Set';
                                } else {
                                    return date('Y-m-d G:i:s', $model['created_at']);
                                }
                            },
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</section>
