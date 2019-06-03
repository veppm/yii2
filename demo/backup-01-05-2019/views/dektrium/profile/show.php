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
use app\models\Profile;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\ContestForm;
/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin([]);?>
<?= $this->render('@app/views/dektrium/profile/topBottom/top-body.php', ['profile'=>$profile])  ?>				
<div class="col-md-9">
	<div class="right_box">
		<div class="user_content">
			<div class="db_box1">
				<div class="db_incontent1">
					<h3><i class="far fa-folder"></i> My Won Competitions</h3>
				</div>
				<div class="db_incontent2">
					<p>There are no project yet. </p>
				</div>
			</div>
		</div>
		<div class="user_content1">
			<div class="db_box2">
				<div class="db_incontent1">
					<h3><i class="far fa-folder"></i> My Saved Competitions</h3>
				</div>
			</div>
		</div>

		<?php if(count($contests)>0) { foreach($contests as $contest) { ?>
			<div class="user_content1">
				<div class="db_box2 no_border_top">
					<div class="db_d_box">
						<p><a href="<?=Url::base()?>/contest/contest-information"> <?=ucfirst($contest->contest_title);?> </a> <span>Feature project</span></p>
					</div>
					<div class="db_ul">
						<ul>
							<li><a href="#"><i class="far fa-money-bill-alt"></i><?=ContestForm::getBudget($contest->approximate_budjet);?></a></li>
							<li><a href="#"><i class="fas fa-list-alt"></i>1 Proposals</a></li>
							<li><a href="#"><i class="far fa-calendar-alt"></i>
								<?=Yii::t('user', '{0, date, dd MMMM YYYY }', [$contest->created_at]);?></a>
							</li>
							<li><a href="#"><i class="far fa-clock"></i>
							<?=ContestForm::timeDuration($contest->created_at)?></a>
							</li>
						</ul>
					</div>
					<div class="dp_para">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a1500s, when an unknown printer took a galley of ty</p>
					</div>
				</div>
			</div> 
		<?php } } else{ ?>
			<div class="user_content1">
				<div class="db_box2 no_border_top">
					<div class="db_incontent1 dp_para">
						<p> There are no project yet. </p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php Pjax::end(); ?>
<?= $this->render('@app/views/dektrium/profile/topBottom/bottom-body.php')  ?>	



				