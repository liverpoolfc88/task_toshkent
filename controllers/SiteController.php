<?php

namespace app\controllers;

use app\modules\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm as Login;
use app\models\ContactForm;
use app\models\Signup;

class SiteController extends Controller
{
//
    public function beforeAction($action)
    {

        if (Yii::$app->user->isGuest) {
            if((Yii::$app->controller->action->id!='login') &&
                (Yii::$app->controller->action->id!='signup')){
                $model = new Login();
                return $this->redirect(['login', 'model' => $model]);
            }
        }
        return parent::beforeAction($action);
    }
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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

    public function actionProfile()

       {
           $user = Yii::$app->user->identity;

           return $this->render('profile',['user'=>$user]);
       }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionUserupdate($id){

        $model = $this->findModel($id);
        if ($id == Yii::$app->user->identity->id){

            if ($model->load(Yii::$app->request->post())) {
                $request = Yii::$app->request->post();
                $model->username = $request['User']['username'];
                $model->email =  $request['User']['email'];
                $model->auth_key = Yii::$app->security->generateRandomString();
                $model->password_hash = Yii::$app->security->generatePasswordHash($request['User']['password']) ;
                $model->save(false);
                return $this->redirect(['index']);

            }
            return $this->render('userupdate', [
                'model' => $model,
            ]);

        }
        return $this->redirect('index');

    }

    public function actionSignup()
    {
        $u = User::find()->count();
        $model = new Signup();
        if ($u == 0){
            if ($model->load(Yii::$app->getRequest()->post())) {
                if ($user = $model->signup1()) {
                    return $this->goHome();
                }
            }

            return $this->render('signup', [
                'model' => $model,
            ]);
        }
        return $this->goHome();

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
