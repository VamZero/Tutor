<?php
/**
 * Created by PhpStorm.
 * User: №zero
 * Date: 2017/3/8
 * Time: 11:22
 */

namespace app\controllers;

use app\actions\AddOrderAction;
use app\actions\ChangePasswordAction;
use app\actions\GetIdentityAction;
use app\actions\GetTopTeachersAction;
use app\actions\LoginAction;
use app\actions\RegisterAction;
use app\actions\SelectOrdersAction;
use app\actions\StudentIdentityAction;
use app\actions\TeacherIdentityAction;
use yii\filters\AccessControl;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['contentNegotiator']['formats']['application/xml']);

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login', 'teacher_identity', 'student_identity', 'add_order', 'select_orders'],
                    'verbs' => ['POST'],
                ],
                [
                    'allow' => true,
                    'actions' => ['top_teachers', 'get_identity'],
                    'verbs' => ['GET'],
                ],
                [
                    'allow' => true,
                    'actions' => ['register', 'change_password'],
                    'verbs' => ['POST'],
                ],
//                [
//                    'allow' => true,
//                    'actions' => ['current_user'],
//                    'verbs' => ['GET'],
//                ],
//                [
//                    'allow' => true,
//                    'actions' => ['logout'],
////                    'roles' => ['@'],
//                    'verbs' => ['POST'],
//                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'login' => LoginAction::className(),
            'top_teachers' => GetTopTeachersAction::className(),
            'teacher_identity' => TeacherIdentityAction::className(),
            'add_order' => AddOrderAction::className(),
            'select_orders' => SelectOrdersAction::className(),
            'get_identity' => GetIdentityAction::className(),
//            'current_user' => $this->actionCurrentUser(),
            'register' => RegisterAction::className(),
            'change_password' => ChangePasswordAction::className(),
            'student_identity' => StudentIdentityAction::className(),
        ];
    }

    public function logout(){
        return \Yii::$app->user->logout();
    }

//    public function actionCurrentUser(){
//        return \Yii::$app->user->isGuest ? null : \Yii::$app->user->identity->getId();
//    }
}