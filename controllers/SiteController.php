<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTalk()
    {
        return $this->render('talk');
    }

    public function actionMessage()
    {
        return $this->render('message');
    }

    public function actionSearch()
    {
        return $this->render('search');
    }
    public function actionMine()
    {
        return $this->render('mine');
    }
    public function actionAuthentication()
    {
        return $this->render('authentication');
    }

    public function actionCourse()
    {
        return $this->render('course');
    }

    public function actionStuauthen()
    {
        return $this->render('stuauthen');
    }

    public function actionTeacherauthen()
    {
        return $this->render('teacherauthen');
    }
}

