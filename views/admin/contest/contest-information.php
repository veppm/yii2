<?php


use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseStringHelper;

use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ContestForm;
use app\models\Role;



$this->title = "Contest Full Brief";
$this->params['breadcrumbs'][] = $this->title;
?>


<style type="text/css">
    .check{
        opacity:0.5;
        color:#996; 
    }
    .information-wrapper {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    padding: 20px;
    display: inline-block;
    width: 100%;
}
</style>

<section class="content-header">
    <h1> <?= $this->title?></h1>
</section>

    <div class="tabbing-content contest-info">
        <div id="fourth" class="tab_div">
            <div class="container-fluid">
                <div class=""> 
                    <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="h2_heading heading-text">
                                    <h2>Background Information</h2>
                                </div> 
                            </div>
                            <div class="col-md-6 mrtop">
                            <div class="information-wrapper bg-aqua">
                                <div class="col-md-12 col-lg-6">
                                <label  class="radio"> 
                                    <div class="label">
                                        <h2>Needs</h2>
                                        <p><?=BaseStringHelper::mb_ucfirst($model->about_situation)?></p>
                                    </div>
                                </label>
                                </div>
								<div class="col-md-12 col-lg-6">
                                <label class="radio">
                                    <div class="label about_family">
                                        <h2>Our Family</h2>
                                        <p for="about_family"><?=BaseStringHelper::mb_ucfirst($model->about_family)?></p>
                                    </div>
                                </label>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6 mrtop">
                            <div class="information-wrapper">
                                <div class="specific-need">
                                    <h2 class="labelh2">Does your family have any specific needs?</h2>
                                    <p ><?=BaseStringHelper::mb_ucfirst($model->family_specific_need);?></p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                     
                   
                </div>
            </div>
        </div>
        <div id="fifth" class="tab_div">
                <div class="container-fluid">
                    <div class="">  
                        <div class="row">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="h2_heading heading-text">
                                        <h2>Specification</h2>
                                    </div> 
                                </div>
                        
                                <div class="col-md-4 mrtop">
                                <div class="information-wrapper bg-green">
                                    <label class="radio">
                                        <div class="label">
                                            <h2>Bedrooms</h2>
                                            <p><?=$model->beds_no;?> </p>
                                        </div>
                                    </label>
                                
                                    <label  class="radio"> 
                                        <div class="label">
                                            <h2>Bathrooms</h2>
                                            <p><?=$model->bathrooms_no?></p>
                                        </div>
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mrtop">
                                <div class="information-wrapper bg-yellow">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <h2>Study </h2>
                                            <p><?='NA'?></p>
                                        </div>
                                    </label>
                                    <label class="radio">
                                        <div class="label about_family">
                                            <h2>Garage</h2>
                                            <p for="about_family"><?='NA'?></p>
                                        </div>
                                    </label>
                                    </div>
                                </div>

                                <div class="col-md-4 mrtop">
                                <div class="information-wrapper">
                                    <div class="specific-need">
                                        <h2 class="labelh2">Types of living spaces</h2>
                                        <p ><?=BaseStringHelper::mb_ucfirst($model->living_spaces);?></p>

                                        <h2 class="labelh2">Any additional spaces not listed?</h2>
                                        <p ><?=BaseStringHelper::mb_ucfirst($model->additional_room);?></p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> 

                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="information-wrapper">
                                    <div class="specific-need">
                                        <h2 class="labelh2">Anything else we have not listed that you want to communicate to the architects? </h2>
                                        <p ><?=BaseStringHelper::mb_ucfirst($model->communicate_architects);?></p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
        </div>
        <div id="seventh" class="tab_div">
            <div class="container-fluid">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="and_finally heading-text">
                                    <h2>Details</h2>
                                </div>
                            </div>
                            <div class="col-md-6 mrtop">
                            <div class="information-wrapper bg-teal-gradient">
                                <label class="radio">
                                    <div class="label">
                                        <h2>Cost</h2>
                                        <p><?=ContestForm::getBudget($model->approximate_budjet);?></p>
                                    </div>
                                </label>
                                </div>  
                            </div>

                            <div class="col-md-6 mrtop">
                            <div class="information-wrapper bg-teal-gradient">
                               <label class="radio">
                                    <div class="label">
                                        <h2>Size of Land</h2>
                                        <p> <?=BaseStringHelper::mb_ucfirst($model->land_other_size);?></p>
                                    </div>
                                </label>
                                </div> 
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
								<div class="bg-red">
                               <label class="radio">
                                    <div class="label">
                                        <h2>Timeframe</h2>
                                        <p><?=BaseStringHelper::mb_ucfirst($model->looking_build);?></p>
                                    </div>
                                </label> 
                                </div>
                            </div>
                           <!--  <div class="col-md-4">
                                <label class="radio">
                                    <div class="label">
                                        <h2>Build</h2>
                                        <span> <?=$model->phone;?></span> <br>
                                    </div>
                                </label> 
                            </div> -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="first" class="tab_div">
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Inspiration</h2>
                    </div> 
                    <div class="row">
                        <?php $explodeIns = explode('||', $model->inspiration);  for ($i=0; $i <count($explodeIns); $i++) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true).'/user-assets/'.$explodeIns[$i];?>" alt="inspiration<?=$i?>" class="inspiration-img img-responsive control-wid-ht">
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div> 
                </div>
                </div>
            </div>
            </div>
        </div>
        
        <div id="third" class="tab_div">
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Materials and Finishes</h2>
                    </div> 
                    <div class="row">
                        <?php $explodeMfinishes = explode('||', $model->materials_finishes);  for ($i=0; $i <count($explodeMfinishes); $i++) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true).'/user-assets/'.$explodeMfinishes[$i];?>" alt="materials-finishes<?=$i?>" class="materials-finishes-img img-responsive control-wid-ht">
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div id="second" class="tab_div">
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <!-- <h2>Building  Site </h2> -->
                        <h2>Site </h2>
                    </div> 
                    <div class="row">
                        <!-- <?php // $explodeBsite = explode('||', $model->building_site);  for ($i=0; $i <count($explodeBsite); $i++) { ?>
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?php // Url::base(true).'/user-assets/images/'.$explodeBsite[$i];?>" alt="building-site<?=$i?>" class="building-site-img img-responsive control-wid-ht">
                                </label>
                            </div>
                        </div>
                        <?php // } ?> -->

                        <div class="col-md-12">
                            <div class="gellery-img" style="height: 800px;">
                                <input id="building_site_map" class="controls form-control"  type="text" placeholder="Search Google Maps" style="hidden" value="<?=$model->building_site?>">
                                <div id="building_site_map_display"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>


        <!-- <div>
            <div class="container-fluid">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Site</h2>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?php // Url::base(true).'/sketch-files/'.$model->sketches;?>" alt="sketches" class="materials-finishes-img img-responsive control-wid-ht">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



        
        <?php if($model->user_id!=\Yii::$app->user->getId() && !\Yii::$app->user->isGuest && Role::getRoleName()==='designer' && ContestForm::contestValidity($model->created_at, $model->contest_duration)>0) { ?>
             <?php $form = ActiveForm::begin([
                    'id'=>'contest_deliverable_form',
                    'options'=>['enctype'=>'multipart/form-data'],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'validateOnBlur' => true,
                    'action' => Url::base().'/contest/submit-proposal',
                    'method' => 'get',
                ]); 
            ?>
                <div id="eight">
                    <div class="container-fluid">
                        <div class="contest-deliverable">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="and_finally heading-text">
                                            <h2>Contest Deliverables</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-8 textarea_comment">
                                        <input type="hidden" value="<?=$model->id;?>" name="proposal_contest">
                                        <textarea class="form-control other-textbox-info" placeholder="This can include anything from drawings, renders, plans, elevations and sections. Anything to convey the idea to the client clearly" name="proposal_comment" id="textarea_comment" readonly="readonly">This can include anything from drawings, renders, plans, elevations and sections. Anything to convey the idea to the client clearly</textarea> 
                                        <div class="help-block"></div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="nine">
                    <div class="container-fluid">
                        <div class="contest-deliverable">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="and_finally">
                                            <div class="btn">
                                                <button type="submit" class="banner_btn" id="submit_proposal_btn">Enter</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="returnback-btn"><a href="<?=Url::base()?>/contest/browse-contest">Return Back to Contests</a></div>
                                    <div class="col-md-8"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        <?php } ?>

    </div> 
<!-- </form> -->
<script src="<?php echo Url::base(true) ?>/user-assets/js/google_map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?=\Yii::$app->params['GoogleMapAPI'];?>&libraries=places&callback=initAutocomplete"></script>

<script type="text/javascript">
    $('#submit_proposal_btn').click(function (e) {
        if($('#textarea_comment').val()==''){
            $('.textarea_comment .help-block').html('This field is required!!');
            return false;
        }

        return true
    });
</script>







