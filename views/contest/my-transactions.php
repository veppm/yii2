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
use app\models\User;
use app\models\ContestProposal;
use yii\widgets\LinkPager;
/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = 'Transaction List';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Pjax::begin([]);?>


<?=$this->render('@app/views/dektrium/profile/topBottom/top-body.php', ['profile'=>Yii::$app->user->identity->profile])  ?>				
<div class="col-md-9">
	<div class="right_box transaction-section">
		<div class="user_content1">
			<div class="db_box2">
				<div class="db_incontent1">
					<h3><i class="far fa-folder"></i> Transaction List </h3>
					<p class="tranc-status-heading"> <?=(count($transactions)>0) ? 'PAYMENT STATUS' : '';?></p>
				</div>
			</div>
		</div>

		<?php 

		/*echo "<pre>";
		print_r($transactions);
		echo "</pre>";
		exit;*/
		if(count($transactions)>0) { foreach($transactions as $transaction) { 

			// if($transaction['payment_date']){
			?>
				<div class="user_content1">
					<div class="db_box2 no_border_top proposal-section">
						<div class="db_d_box">
							<p class="won">
								<a title="Contest Name" href="<?=Url::base()?>/contest/contest-information?contest-proposal=<?=$transaction['id']?>"> <?=ucfirst(User::limitTitle60($transaction['contest_title']));?> </a> 
								<span class="order_no" title="Order Number" > <?=ucfirst($transaction['order_id']);?></span>
								<a  href="javascript:void(0);" class="btn btn-success won-btn custome-btn"><?=($transaction['tn_payment_status']=='success') ? 'Success' : 'Pending';?></a>
							</p> 
						</div>

						<div class="db_ul">
							<ul>
								<li><a href="javascript:void(0);" title="Transaction Amount"><i class="far fa-money-bill-alt"></i> $<?=($transaction['tn_transaction_amount']) ? number_format($transaction['tn_transaction_amount'],2) : number_format($transaction['design_package'],2) ;?></a></li>
								<?php // if($transaction['transaction_id']) {  ?>
									<li><a href="" title="Transaction Number"><i class="fas fa-list-alt"></i><?=($transaction['transaction_id']) ? $transaction['transaction_id'] : ' --- ';?> </a></li>
									<li><a href="" title="Transaction Date"><i class="far fa-calendar-alt"></i><?=($transaction['tn_payment_date']) ? Yii::t('user', '{0, date, dd MMMM YYYY }', $transaction['tn_payment_date']) : Yii::t('user', '{0, date, dd MMMM YYYY }', $transaction['created_at']) ;?></a></li>
								<?php // } ?>
							</ul>
						</div>
					</div>
				</div> 
		<?php // } 
		} } else { ?>
			<div class="user_content1">
				<div class="db_box2 no_border_top">
					<div class="db_incontent1 dp_para">
						<p> There are no project yet. </p>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="contest_pagination"><?=LinkPager::widget(['pagination' =>$pages])?></div>
	</div>
</div>
<?php Pjax::end(); ?>
<?= $this->render('@app/views/dektrium/profile/topBottom/bottom-body.php')  ?>	

