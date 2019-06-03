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
use app\models\ContestProposal;
/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = 'Proposal List';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Pjax::begin([]);?>


<?=$this->render('@app/views/dektrium/profile/topBottom/top-body.php', ['profile'=>Yii::$app->user->identity->profile])  ?>				
<div class="col-md-9">
	<div class="right_box">
		<div class="user_content1">
			<div class="db_box2">
				<div class="db_incontent1">
					<h3><i class="far fa-folder"></i> Proposal List </h3>
				</div>
			</div>
		</div>

		<?php 
		if(count($proposals)>0) { foreach($proposals as $proposal) { 
			if($proposal['enddate']<time()){
			?>
				<div class="user_content1">
					<div class="db_box2 no_border_top proposal-section">
						<div class="db_d_box">
							<p class="won">
								<a title="Contest Name" href="<?=Url::base()?>/contest/contest-information?contest-proposal=<?=$proposal['id']?>"> <?=ucfirst($proposal['contest_title']);?> </a> 
								<label class="proposal-username" title="Proposal sender user"><i class="fa fa-user" aria-hidden="true"></i> <?=ucfirst($proposal['username']);?></label>

								<?php if(ContestForm::wonStatus($proposal['id'])>0 && $proposal['user_won']==1){  ?>
									<a data-method="POST" href="javascript:void(0);" class="btn btn-success won-btn"> Won Proposal</a>
								<?php } else{ ?>
										<a data-method="POST" data-confirm="Are you sure to continue?" href="<?=Url::base()?>/contest/won-proposal?contest-proposal=<?=$proposal['cp_id'].'&contest='.$proposal['id'];?>" class="btn btn-success won-btn custome-btn">You Won</a>
								<?php } ?>
							</p> 
						</div>
						<div class="dp_para">
							<p class="contest-title" title="Proposal comment"><?=$proposal['comment'];?></p> 
							<p>
	                            <a href="<?=Url::base().'/proposal-files/'.$proposal['design_files'];?>"   target="_blank" download>
	                                <img src="<?=Url::base().'/proposal-files/'.$proposal['design_files'];?>" style="width: 10%; height: 10%;">
	                            </a> 


	                        </p>
						</div>
					</div>
				</div> 
		<?php } } } else { ?>
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

