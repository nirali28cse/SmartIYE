<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
	 
	public function actionLivedata()
    {

			$tag_id=$_GET['tag_id'];
			$user_key=Yii::$app->user->identity->api_key;
			$user_sn=Yii::$app->user->identity->api_sn;
			// The x value is the current JavaScript time, which is the Unix time multiplied 
			// by 1000.
			$x = time() * 1000;
			// The y value is a random number
		//	$y = rand(0, 100);
			$api_url="https://rsp-vpn.mbconnect24.net/portal/index.php?option=com_dataapi&key=ZQFwUAbKw15OHi4TBNQq&sn=361490600139&tagid=".$tag_id."&live=1";
			// $request = "uname=pragna&password=123abc&sender=KACHUA&receiver=9510000691&route=T&msgtype=1&sms=Hi,your course from kachhua.com is sent through SPEED POST";
			$responce =file_get_contents($api_url);
			$responce =json_decode($responce);
			
			if($responce!=null){
				$value=$responce[0]->value;
				$y=$value;
			}else{
				$y=0;
			}

			// Create a PHP array and echo it as JSON
			$ret = array($x, $y);
			echo json_encode($ret);
	}	
	
	public function actionLivedataguage()
    {
		
			$tag_id=$_GET['tag_id'];
			$user_key=Yii::$app->user->identity->api_key;
			$user_sn=Yii::$app->user->identity->api_sn;
			// The x value is the current JavaScript time, which is the Unix time multiplied 
			// by 1000.
			$x = time() * 1000;
			// The y value is a random number
		//	$y = rand(0, 100);
			$api_url="https://rsp-vpn.mbconnect24.net/portal/index.php?option=com_dataapi&key=ZQFwUAbKw15OHi4TBNQq&sn=361490600139&tagid=".$tag_id."&live=1";
			// $request = "uname=pragna&password=123abc&sender=KACHUA&receiver=9510000691&route=T&msgtype=1&sms=Hi,your course from kachhua.com is sent through SPEED POST";
			$responce =file_get_contents($api_url);
			$responce =json_decode($responce);
			
			if($responce!=null){
				$value=$responce[0]->value;
				$y=$value;
			}else{
				$y=0;
			}

			// Create a PHP array and echo it as JSON
			$ret = array($x, $y);
			
			echo json_encode($ret);
	}	 
	
	
	public function actionDashbord()
    {
		return $this->render('dashbord1');
	}
	 
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest) {
          return $this->redirect(['users/login']);
        }else{
			 return $this->render('index');
		}
       
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
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
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
}
