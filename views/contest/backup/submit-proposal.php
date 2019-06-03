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
        <?php if($model->user_id!=\Yii::$app->user->getId() && !\Yii::$app->user->isGuest && Role::getRoleName()==='designer') { ?>
             <?php $form = ActiveForm::begin([
                    'id'=>'contest_deliverable_form',
                    'options'=>['enctype'=>'multipart/form-data'],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => true,
                    'validateOnBlur' => true,
                ]); 
            ?>
                <div class="submit-proposal">
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
                                        <input type="hidden" value="<?=$model->id;?>" name="ContestProposal[contest_id]">
                                        <textarea class="form-control other-textbox-info" placeholder="This can include anything from drawings, renders, plans, elevations and sections. Anything to convey the idea to the client clearly" name="ContestProposal[comment]" id="textarea_comment"><?= (!$formdata->comment) ? Yii::$app->request->get('proposal_comment') : $formdata->comment;?></textarea> 
                                        <?=Html::error($formdata,'comment', ['class' => 'help-block']); ?>  
                                    </div>
                                    
                                </div>

                                <div class="col-md-12 upload-design-files">
                                    <div class="col-md-4">
                                        <div class="and_finally heading-text">
                                            <h2>Upload File</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4 design_files">
                                        <div class="file-area">
                                            <input type="file" class="upload-designs" name="ContestProposal[design_files]" id="design_files"> 
                                            <!-- <input type="file" class="upload-designs" name="ContestProposal[design_files]" id="design_files">  -->
                                            <p>
                                                <span id="files-count">Upload</span>
                                            </p> 
                                        </div>
                                        <?=Html::error($formdata,'design_files', ['class' => 'help-block']); ?>  
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
                                                <button type="submit" class="banner_btn" id="submit_proposal_btn">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="returnback-btn"><a href="<?=Url::base()?>/contest/browse-contest">Return Back to Contests</a></div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        <?php }else { ?>
            <div class="submit-proposal">
                <div class="costing_content contest-deliverable">
                    <div class="db_box2 cost_box">
                        <div class="db_incontent1 dp_para">
                            <p> Sorry no record found!!.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div> 
<!-- </form> -->

<script type="text/javascript">
    $('#submit_proposal_btn').click(function (e) {

        if($('#textarea_comment').val()=='' && document.getElementById('design_files').files.length<1){
            $('.help-block').html('This field is required!!');
            return false;
        }

        if($('#textarea_comment').val()==''){
            $('.textarea_comment .help-block').html('This field is required!!');
            return false;
        }

        if(document.getElementById('design_files').files.length<1){
            $('.design_files .help-block').html('This field is required!!');
            return false;
        }

        /*if(document.getElementById('design_files').files.length>5){
            alert("You can't upload more than 5 files");
            return false;
        }*/
        return true
    });

    $('.upload-design-files .upload-designs').change(function () {
        $('.submit-proposal .upload-design-files .file-area p').css('letter-spacing','0px');
        $('.upload-design-files #files-count').text(this.files.length + " file(s) selected");
    });
</script>







