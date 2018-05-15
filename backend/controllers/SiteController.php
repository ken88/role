<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $enableCsrfValidation = false;
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $userinfo = Yii::$app->session->get('userinfo');
        if (!empty($userinfo)) {
            $this->redirect('/index/index');
        }

        if (Yii::$app->request->post()) {
            if ($model->login(Yii::$app->request->post())) {
                $this->redirect('/index/index');
            }
        }
        return $this->renderPartial('login', [
            'model' => $model,
        ]);

    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->session->removeAll();
        $this->redirect('/site/login');
    }

}
