<?php


namespace app\controllers;


use app\models\Post;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;

class PostController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['show','get'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'show' => ['get'],
                    'get' => ['post',]
                ],
            ],
        ];
    }

    public function actionShow()
    {
        $model = Post::find()->all();
        return $this->render('show',compact('model'));
    }

    public function actionGet()
    {
        $request = \Yii::$app->request->post();
        $post = Post::findOne($request['id']);

//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Json::encode([
            'postText' => $post->text,
            'postTitle' => $post->header,
        ]);
    }
}