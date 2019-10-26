<?php


namespace app\controllers;


use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class RegistrationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
    public function actionShow()
    {
        return $this->render('show',[
            'model' => new User()
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionRegistration()
    {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }

        $password = \Yii::$app->request->post('User')['password_hash'];
        $username = \Yii::$app->request->post('User')['username'];

        $user = new User();
        $user->username = $username;
        $user->password_hash = \Yii::$app->security->generatePasswordHash($password);
        $user->auth_key = \Yii::$app->security->generateRandomString();
        if($user->save()){
            \Yii::$app->user->login($user);
            return  \Yii::$app->response->redirect(Url::toRoute('/posts'));
        }
        return \Yii::$app->response->redirect(Url::to('/registration/show'));
//        if($user->save()){
//            \Yii::$app->user->login($user);
//            return  \Yii::$app->response->redirect(Url::to('post/show'));
//        }
//
//
//        return \Yii::$app->response->redirect(Url::to('registration/show'));
    }
}