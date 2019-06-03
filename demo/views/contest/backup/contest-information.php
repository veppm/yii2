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



$this->title = "City refuge for a family of 5!";
$this->params['breadcrumbs']['bottom-text'] = "Hi there, my family and I currently have a existing house that needs renovating for a family of 5. We want a retreat away from the hustle and bustle of life!";
$this->params['breadcrumbs'][] = $this->title;
?>


<style type="text/css">
    .check{
        opacity:0.5;
        color:#996; 
    }
</style>

    <div class="tabbing-content contest-info">
        <div id="fourth" class="tab_div">
            <div class="container-fluid">
                <div class=""> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="h2_heading heading-text">
                                    <h2>Background Information</h2>
                                </div> 
                            </div>
                            <div class="col-md-4 mrtop">
                                <label  class="radio"> 
                                    <div class="label">
                                        <h2>Needs</h2>
                                        <p><?=BaseStringHelper::mb_ucfirst($model->about_situation)?></p>
                                    </div>
                                </label>
                                <label class="radio">
                                    <div class="label about_family">
                                        <h2>Our Family</h2>
                                        <p for="about_family"><?=BaseStringHelper::mb_ucfirst($model->about_family)?></p>
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-4 mrtop">
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
        <div id="fifth" class="tab_div">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="">  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="h2_heading heading-text">
                                        <h2>Specification</h2>
                                    </div> 
                                </div>
                        
                                <div class="col-md-2 mrtop">
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
                                <div class="col-md-2 mrtop">
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

                                <div class="col-md-4 mrtop">
                                    <div class="specific-need">
                                        <h2 class="labelh2">Types of living spaces</h2>
                                        <p ><?=BaseStringHelper::mb_ucfirst($model->living_spaces);?></p>

                                        <h2 class="labelh2">Any additional spaces not listed?</h2>
                                        <p ><?=BaseStringHelper::mb_ucfirst($model->additional_room);?></p>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
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
        <div id="seventh" class="tab_div">
            <div class="container-fluid">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="and_finally heading-text">
                                    <h2>Details</h2>
                                </div>
                            </div>
                            <div class="col-md-4 mrtop">
                                <label class="radio">
                                    <div class="label">
                                        <h2>Cost</h2>
                                        <p><?=ContestForm::getBudget($model->approximate_budjet);?></p>
                                    </div>
                                </label>  
                            </div>

                            <div class="col-md-4 mrtop">
                               <label class="radio">
                                    <div class="label">
                                        <h2>Size of Land</h2>
                                        <p><?=BaseStringHelper::mb_ucfirst($model->land_other_size);?></p>
                                    </div>
                                </label> 
                            </div>
                            
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                               <label class="radio">
                                    <div class="label">
                                        <h2>Timeframe</h2>
                                        <p><?=BaseStringHelper::mb_ucfirst($model->looking_build);?></p>
                                    </div>
                                </label> 
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

        <div id="first" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Inspiration</h2>
                    </div> 
                    <div class="row">
                        <?php $explodeIns = explode('||', $model->inspiration);  for ($i=0; $i <count($explodeIns); $i++) { ?>
                        <div class="col-md-4">
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
        <div id="second" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Building  Site </h2>
                    </div> 
                    <div class="row">
                        <?php $explodeBsite = explode('||', $model->building_site);  for ($i=0; $i <count($explodeBsite); $i++) { ?>
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true).'/user-assets/images/'.$explodeBsite[$i];?>" alt="building-site<?=$i?>" class="building-site-img img-responsive control-wid-ht">
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="third" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Materials and Finishes</h2>
                    </div> 
                    <div class="row">
                        <?php $explodeMfinishes = explode('||', $model->materials_finishes);  for ($i=0; $i <count($explodeBsite); $i++) { ?>
                        <div class="col-md-4">
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


        <div>
            <div class="container-fluid">
                <div class="gellery">
                    <div class="h2_heading heading-text">
                        <h2>Site</h2>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true).'/sketch-files/'.$model->sketches;?>" alt="sketches" class="materials-finishes-img img-responsive control-wid-ht">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
        <?php if($model->user_id!=\Yii::$app->user->getId() && !\Yii::$app->user->isGuest && Role::getRoleName()==='designer') { ?>
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
                                        <textarea class="form-control other-textbox-info" placeholder="This can include anything from drawings, renders, plans, elevations and sections. Anything to convey the idea to the client clearly" name="proposal_comment" id="textarea_comment"></textarea> 
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

<script type="text/javascript">
    $('#submit_proposal_btn').click(function (e) {
        if($('#textarea_comment').val()==''){
            $('.textarea_comment .help-block').html('This field is required!!');
            return false;
        }

        return true
    });

</script>







