<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class EntryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => new User(),
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $username = \Yii::$app->request->post('User')['username'];
        $password = \Yii::$app->request->post('User')['password_hash'];

        $user = User::findOne(['username' => $username]);
        if($user && $user->validate()) {
            if(\Yii::$app->security->validatePassword($password,$user->password_hash)){
                \Yii::$app->user->login($user);
                return  \Yii::$app->response->redirect(Url::to('post/show'));
            };
        }
        \Yii::$app->session->setFlash('loginError', 'Неправильный логин или пароль');
        return \Yii::$app->response->redirect(Url::to('entry/index'));
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

}