<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\controllers;

use app\models\Role;
use app\models\Competition;
use app\models\ContestForm;
use dektrium\user\Finder;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use dektrium\user\controllers\ProfileController as BaseProfileController;

/**
 * ProfileController shows users profiles.
 *
 * @property \dektrium\user\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class ProfileController extends BaseProfileController
{
    
    public function actionShow($id)
    {
        
        $profile = $this->finder->findProfileById($id);
        $contest =  ContestForm::find()
                        ->leftJoin('contest_proposal as cp', 'cp.contest_id=contest.id')
                        ->where(['cp.user_id'=>$id])
                        ->orwhere(['contest.user_id'=>$id])
                        ->limit(5)
                        ->orderBy(['cp.created_at'=>SORT_DESC, 'contest.created_at'=>SORT_DESC])
                        ->all();
        if ($profile === null || ($id!=\Yii::$app->user->getId())) {
            throw new NotFoundHttpException();
        }

        return $this->render('show', [
            'profile' => $profile,
            'contests' => $contest
        ]);
    }
}
