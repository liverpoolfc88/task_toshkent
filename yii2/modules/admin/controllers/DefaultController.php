<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\LoginForm as Login;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    public function beforeAction($action)
    {

        if ((Yii::$app->user->isGuest) || (Yii::$app->user->identity->role == 'klient')) {
            if((Yii::$app->controller->action->id!='login') &&
                (Yii::$app->controller->action->id!='signup')){
                $model = new Login();
                return $this->redirect(['login', 'model' => $model]);
            }
        }
        return parent::beforeAction($action);
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
