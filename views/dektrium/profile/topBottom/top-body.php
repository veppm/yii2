<?php
use yii\helpers\Html;
use app\models\Profile;
use app\models\Role;
use app\models\ContestForm;
use yii\helpers\Url;
?>
<div class="profile_section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="user_profile">
					<h2 class="db_heading">My Account</h2>
					<div class="col-md-3">
						<div class="user_side-bar">
							<div class="db_link">
								<a href="<?=Url::base()?>/contest/browse-contest" class="link_btn">Browse Contests</a>
							</div>
							<div class="user_db">
								<div class="user_db_h2 my-dashboard">
									<h3><i class="fas fa-cog"></i> 
									<a href="<?=Url::base()?>/user/<?=\Yii::$app->user->identity->getId();?>"  title="Goto Dashboard">
									My dashboard
									</a></h3>
								</div>
								<div class="user_db_img">
									<img src="<?php echo Url::base(true).'/'.Profile::getProfileImage(); ?>" alt="person" class="user_img">
								</div>
								<div class="user_bdname">
									<p><?= Role::getRoleName('display_name').'( '.$profile->user->username.' )';?></p>
								</div>

								<div class="user_db_detail_1">
									<div class="db_2">
										<p class="pull-left db_m">Project in progress:</p>
										<p class="pull-right db_output"><?=ContestForm::myWonCount()?></p>
									</div>
								</div>


								<!-- <div class="user_db_detail_1">
									<p class="pull-left db_r">Registered on:</p>
									<p class="pull-right db_output">
										<?=Yii::t('user', '{0, date, dd MMMM, YYYY}', [$profile->user->created_at])?>
									</p>
								</div>
								<div class="user_db_detail_2">
									<p class="pull-left db_m">My Inbox (2):</p>
									<p class="pull-right db_output">Check All</p>
								</div>
								<div class="user_db_detail_3">
									<div class="db_1">
										<p class="pull-left db_m">All open projects:</p>
										<p class="pull-right db_output">3</p>
									</div>
									<div class="db_2">
										<p class="pull-left db_m">project in progress:</p>
										<p class="pull-right db_output">2</p>
									</div>
									<div class="db_3">
										<p class="pull-left db_m">Balance:</p>
										<p class="pull-right db_output">$234.98</p>
									</div>
								</div> -->
								
								<div class="user_db_detail_4">
									<div class="db_4">
										<a href="<?=Url::base()?>/user/settings/account" class="btn btn-primary custome-btn" title="Account settings">Account</a>
										<a href="<?=Url::base()?>/user/settings/profile" class="btn btn-primary custome-btn" title="Profile settings">Profile</a>
										<a href="<?=Url::base()?>/contest/my-transactions" class="btn btn-primary custome-btn" title="My Transactions">My Transactions</a>
									</div>
								</div>
							</div>
						</div>
					</div>