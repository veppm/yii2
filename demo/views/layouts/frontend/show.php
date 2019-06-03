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
use app\models\Role;
use app\models\Profile;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\ContestForm;
use app\models\ContestProposal;
/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

//$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->title = (Role::getRoleName()=='designer') ? Html::encode(Role::getRoleName('display_name')) : Html::encode($profile->user->username);
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin([]);?>
<?= $this->render('@app/views/dektrium/profile/topBottom/top-body.php', ['profile'=>$profile])  ?>				
<div class="col-md-9">
	<div class="right_box">

		<?php if(Role::getRoleName()==='designer') { ?>
			<div class="user_content1">
				<div class="db_box2">
					<div class="db_incontent1 my-won">
						<h3><i class="far fa-folder"></i> My Won Competitions</h3>
					</div>
				</div>
			</div>
			<?php if(count($won_contests)>0) { foreach($won_contests as $won_contest) { ?>
			<div class="user_content1 dahboard-contest-mrb">
				<div class="db_box2 no_border_top">
					<div class="db_d_box">
						<p><a href="<?=Url::base()?>/contest/contest-information?contest-proposal=<?=$won_contest['id']?>"> <?=ucfirst($won_contest['contest_title']);?> </a></p>
					</div>
					<div class="db_ul">
						<ul>
							<li><a href="javascript::void(0)"><i class="far fa-money-bill-alt"></i><?=ContestForm::getBudget($won_contest['approximate_budjet']);?></a></li>
							<li><a href="javascript::void(0)"><i class="far fa-calendar-alt"></i>
								<?=Yii::t('user', '{0, date, dd MMMM YYYY }', $won_contest['created_at']);?></a>
							</li>
						</ul>
					</div>
					<div class="dp_para">
						<p><?=$won_contest['family_specific_need'];?></p>
						<p><?=$won_contest['communicate_architects'];?></p>
					</div>
				</div>
			</div> 
			<?php }  } else { ?>
				<div class="user_content1 dahboard-contest-mrb">
					<div class="db_box2 no_border_top">
						<div class="db_incontent1 dp_para">
							<p> There are no won competition. </p>
						</div>
					</div>
				</div>
			<?php }  } ?>
	
				
			


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
						<p><a href="<?=Url::base()?>/contest/contest-information?contest-proposal=<?=$contest->id?>"> <?=ucfirst($contest->contest_title);?> </a> <span>Feature project</span></p>
					</div>
					<div class="db_ul">
						<ul>
							<li><a href="javascript::void(0);"><i class="far fa-money-bill-alt"></i><?=ContestForm::getBudget($contest->approximate_budjet);?></a></li>
							<li><a href="<?=(ContestForm::contestValidity($contest->created_at, $contest->contest_duration)<0 && $contest->user_id==Yii::$app->user->getId()) ? Url::base().'/contest/proposals?contest-proposal='.$contest->id: 'javascript:void(0)'; ?>"><i class="fas fa-list-alt"></i><?=ContestProposal::countProposals($contest->id);?> Proposals</a></li>
							<li><a href="#"><i class="far fa-calendar-alt"></i>
								<?=Yii::t('user', '{0, date, dd MMMM YYYY }', [$contest->created_at]);?></a>
							</li>
							<li><a href="#"><i class="far fa-clock"></i>
							<?=ContestForm::timeDuration($contest->created_at, $contest->contest_duration)?></a>
							</li>
						</ul>
					</div>
					<div class="dp_para">
						<p><?=$contest->family_specific_need;?></p>
						<p><?=$contest->communicate_architects;?></p>
					</div>
				</div>
			</div> 
		<?php } } else{ ?>
			<div class="user_content1">
				<div class="db_box2 no_border_top">
					<div class="db_incontent1 dp_para">
						<p> There are no competition. </p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php Pjax::end(); ?>
<?= $this->render('@app/views/dektrium/profile/topBottom/bottom-body.php')  ?>	



