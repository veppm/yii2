<?php


use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ContestForm;



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

 <?php /*$form = ActiveForm::begin([
        'id'=>'contest_form',
        'options'=>[
            'enctype'=>'multipart/form-data',
        ],
        //'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'validateOnBlur' => true,
    ]); */
?>

<?php //  $form->errorSummary($model); ?>
<!-- <form id="contest_form"> -->


    <div class="tabbing-content">
        <div id="fourth" class="tab_div">
            <div class="container-fluid">
                <div class="user_form"> 
                    <div class="row">
                        <div class="box_1_content">
                            <div class="col-md-4">
                                <div class="h2_heading">
                                    <h2>Background Information</h2>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="boxr_1">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <p><?=$model->about_situation?></p>
                                        </div>
                                    </label>
                               </div>
                               <div class="boxr_2">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <p><?=$model->about_situation?></p>
                                        </div>
                                    </label>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxr_long">
                                    <label class="radio">
                                        <div class="label about_family">
                                            <span for="about_family"><?=$model->about_family?></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                         </div>
                    </div>


                        <!-- <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="h2_heading">
                                    <h2>Background Information</h2>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <label  class="radio"> 
                                    <div class="label">
                                        <p><?=$model->about_situation?></p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio">
                                    <div class="label about_family">
                                        <span for="about_family"><?=$model->about_family?></span>
                                    </div>
                                </label>
                            </div>
                        </div> -->


                        <!-- <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <textarea rows="10" class="form-control other-textbox-info"><?=$model->about_situation_other;?></textarea>
                            </div>
                            <div class="col-md-4">
                               <textarea class="form-control other-textbox-info"><?=$model->about_family_other;?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <textarea  class="form-control other-textbox-info"><?=$model->family_specific_need;?></textarea>
                            </div>
                            <div class="col-md-4">
                               <textarea class="form-control other-textbox-info"><?=$model->living_spaces;?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label  class="radio"> 
                                    <div class="label">
                                        <p><?=$model->beds_no;?></p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-4">
                               <label  class="radio"> 
                                    <div class="label">
                                        <p><?=$model->bathrooms_no?></p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <textarea class="form-control other-textbox-info" ><?=$model->additional_room;?></textarea>
                            </div>
                            <div class="col-md-4">
                               <textarea class="form-control other-textbox-info"><?=$model->communicate_architects;?></textarea>
                            </div>
                        </div>

                    </div>
                     
                   
                </div>
            </div>
        </div> -->
        <div id="fifth" class="tab_div">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="user_form">  
                        <div class="row">
                            <div class="box_2_content">
                                <div class="col-md-4">
                                    <div class="h2_heading">
                                        <h2>Specification</h2>
                                    </div> 
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="box_8_content">
                                            <div class="col-md-6">
                                                <div class="box_small">
                                                    <div class="div_1">
                                                        <label class="radio">
                                                            <div class="label approximate_budjet">
                                                                <!-- <span for="approximate_budjet"><?=ContestForm::getBudget($model->approximate_budjet);?> </span> <br> -->
                                                                <h2 class="label_h2_h">label</h2>
                                                                <h2 class="label_h2_h1">level5554</h2>
                                                            </div>
                                                        </label>
                                                     </div>
                                                     <div class="div_1" style="margin-left:2px">
                                                        <label class="radio">
                                                             <div class="label approximate_budjet">
                                                                <!-- <span for="approximate_budjet"><?=ContestForm::getBudget($model->approximate_budjet);?> </span> <br> -->
                                                                <h2 class="label_h2_h">label</h2>
                                                                <h2 class="label_h2_h1">level5554</h2>
                                                            </div>
                                                        </label>
                                                     </div>
                                                     <div class="div_1">
                                                        <label class="radio">
                                                             <div class="label approximate_budjet">
                                                                <!-- <span for="approximate_budjet"><?=ContestForm::getBudget($model->approximate_budjet);?> </span> <br> -->
                                                                <h2 class="label_h2_h">label</h2>
                                                                <h2 class="label_h2_h1">level5554</h2>
                                                            </div>
                                                        </label>
                                                     </div>
                                                     <div class="div_1"style="margin-left:2px">
                                                        <label class="radio">
                                                             <div class="label approximate_budjet">
                                                                <!-- <span for="approximate_budjet"><?=ContestForm::getBudget($model->approximate_budjet);?> </span> <br> -->
                                                                <h2 class="label_h2_h">label</h2>
                                                                <h2 class="label_h2_h1">level5554</h2>
                                                            </div>
                                                        </label>
                                                     </div>

                                                 </div> 
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="boxr_long">
                                                    <label class="radio">
                                                        <div class="label about_family">
                                                            <span for="about_family"><?=$model->about_family?></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="boxr_long">
                                            <label class="radio">
                                                <div class="label about_family">
                                                    <span for="about_family"><?=$model->about_family?></span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- <div class="col-md-4">
                                    <div class="boxr_3">
                                        <label class="radio">
                                            <div class="label approximate_budjet">
                                                <span for="approximate_budjet"><?=ContestForm::getBudget($model->approximate_budjet);?> </span> <br>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="radio">
                                        <div class="label looking_build">
                                            <label for="looking_build"><?=$model->looking_build;?></label> <br>
                                        </div>
                                    </label>
                                </div> -->
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div id="sixth" class="tab_div">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="h2_heading">
                                <h2>Package Information</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <textarea class="form-control other-textbox-info"><?=$model->contest_title;?></textarea> 
                        </div>
                        <div class="col-md-4">
                            <label class="radio">
                                <div class="label">
                                    <span> <?=$model->contest_duration;?></span> <br>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div id="seventh" class="tab_div">
            <div class="container-fluid">
                <div class="contact_details">
                    <div class="row">
                        <div class="box_3_content">
                            <div class="col-md-4">
                                <div class="and_finally">
                                    <h2>  Details</h2>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxr_1">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <p><?=$model->about_situation?></p>
                                        </div>
                                    </label>
                               </div>
                               <div class="boxr_2">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <p><?=$model->about_situation?></p>
                                        </div>
                                    </label>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxr_1">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <p><?=$model->about_situation?></p>
                                        </div>
                                    </label>
                               </div>
                               <div class="boxr_2">
                                    <label  class="radio"> 
                                        <div class="label">
                                            <p><?=$model->about_situation?></p>
                                        </div>
                                    </label>
                               </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label class="radio">
                                    <div class="label">
                                        <span> <?=$model->phone;?></span> <br>
                                    </div>
                                </label> 
                            </div>
                            <div class="col-md-4"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div id="first" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="h2_heading">
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
                    <div class="h2_heading">
                        <h2>Materials and Finishes</h2>
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
                    <div class="h2_heading">
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
    </div> 
<!-- </form> -->
<?php // ActiveForm::end(); ?>






