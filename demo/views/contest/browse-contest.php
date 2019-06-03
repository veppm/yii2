<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ContestForm;
use app\models\ContestProposal;

$this->title = 'Browse Contest';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costing_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="search_section">
                        <form class="example" style="margin:auto;" method="get" id="contest-search-form">
                            <div class="col-md-8">
                                <div class="search_box">
                                    <input type="text" placeholder="Search Project" name="searchkey" id="searchkey" value="<?=\Yii::$app->request->get('searchkey')?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="select_box">
                                    <div class="form-group">
                                      <?php $options = ['asc'=>'Asc','desc'=>'Desc']; ?>
                                      <select class="form-control" id="searchby" name="searchby">
                                        <option value="">Newest First</option>
                                        <?php foreach ($options as $value => $key) { ?>
                                            <option value="<?=$value;?>" <?=(\Yii::$app->request->get('searchby')==$value) ? 'selected="selected"' : ''?>> <?=$key;?></option>
                                        <?php } ?>

                                         </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="costing_detail">
            <div class="row">
                <div class="col-md-12">

                    <?php if($models){  foreach ($models as  $contest) { ?>
                      
                    <div class="costing_content">
                        <div class="cost_box">
                            <!-- <div class="cost_incontent">
                                <h3><i class="far fa-folder"></i> My Saved Competitions</h3>
                            </div> -->
                            <div class="cost_d_box">
                                <p><a href="<?=Url::base()?>/contest/contest-information?contest-proposal=<?=$contest->id?>"> <?=ucfirst($contest->contest_title);?> </a><span>Feature project</span></p>
                            </div>
                            <div class="cost_ul">
                                <ul>
                                    <li>
                                        <a href="#"><i class="far fa-money-bill-alt"></i> 
                                            <?=ContestForm::getBudget($contest->approximate_budjet);?> 
                                        </a>
                                    </li>
                                    <li><a href="<?=(ContestForm::contestValidity($contest->created_at, $contest->contest_duration)<0 && $contest->user_id==Yii::$app->user->getId()) ? Url::base().'/contest/proposals?contest-proposal='.$contest->id: 'javascript:void(0)'; ?>"><i class="fas fa-list-alt"></i><?=ContestProposal::countProposals($contest->id);?> Proposals </a></li>
                                    <li><a href="#"><i class="far fa-calendar-alt"></i>
                                        <?=Yii::t('user', '{0, date, dd MMMM YYYY }', [$contest->created_at]);?></a>
                                    </li>
                                    <li><a href="#"><i class="far fa-clock"></i><?=ContestForm::timeDuration($contest->created_at, $contest->contest_duration)?></a></li>
                                </ul>
                            </div>
                            <div class="cost_para">
                                <p><?=$contest->family_specific_need;?></p>
                                <p><?=$contest->communicate_architects;?></p>
                            </div>
                        </div>
                    </div>
                    <?php }  } else { ?>
                        <div class="costing_content">
                            <div class="db_box2 cost_box">
                                <div class="db_incontent1 dp_para">
                                    <p> There are no project yet. </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="contest_pagination"><?=LinkPager::widget(['pagination' =>$pages])?></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#searchby').change(function() {
        doneTypingSubmitForm();
    });

       
    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = '0200';  //time in ms, 5 second for example
    var $input = $('#searchkey');
    //on keyup, start the countdown
    $input.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTypingSubmitForm, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });

    
    function doneTypingSubmitForm() {
      // obj.form.submit();
      $('#contest-search-form').submit();
    }



</script>
