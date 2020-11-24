<?php

namespace app\controllers;
use app\models\Post;
use app\models\LoginForm as Login;
class PostController extends \yii\web\Controller
{
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

    public function actionIndex()
    {
        $model = Post::find()->all();
        return $this->render('index',[
            'model'=>$model,
        ]);
    }

}
