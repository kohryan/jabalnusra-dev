<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest){
			$this->redirect(array('login'));
		} 

		$analisis=new Analisis;
		$berita=new Berita;
		$publikasi=new Publikasi;
		$data=new Data;
		
		$nAnalaisis=$analisis->count();
		$nBerita=$berita->count();
		$nPublikasi=$publikasi->count();
		$nData=$data->count();

		$_data=array(
			'analisis'=>$nAnalaisis,
			'berita'=>$nBerita,
			'publikasi'=>$nPublikasi,
			'data'=>$nData,
		);
		if(Yii::app()->user->role=='SUPERADMIN') { 
			$user=new User;
			$_data['user']=$user->count();
		}
		$this->render('index',$_data);
	}

	public function actionBerita(){
		$this->render('berita/list');
	}

	public function actionTambahBerita(){
		$this->render('berita/list');
	}

	public function actionPublikasi(){
		$this->render('publikasi/list');
	}

	public function actionAnalisis(){
		$this->render('analisis/list');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//Include Google Client Library for PHP autoload file
		require_once(Yii::getPathOfAlias('vendor') . '/autoload.php');
		require_once(Yii::getPathOfAlias('config') . '/gconfig.php');
		
		$this->layout="login";
 		
		$model=new LoginForm;
		
		if(isset($_GET["code"])){
			//Include Google Client Library for PHP autoload file
			require_once(Yii::getPathOfAlias('vendor') . '/autoload.php');
			require_once(Yii::getPathOfAlias('config') . '/gconfig.php');
			
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
			if(!isset($token['error'])){
				//Set the access token used for requests
				$google_client->setAccessToken($token['access_token']);

				//Store "access_token" value in $_SESSION variable for future use.
				$_SESSION['access_token'] = $token['access_token'];

				//Create Object of Google Service OAuth 2 class
				$google_service = new Google_Service_Oauth2($google_client);

				//Get user profile data from google
				$data = $google_service->userinfo->get();


				if(isset($data['email'])){
					$model->username=$data['email'];
				}
				
				if($model->validate() && $model->login()){
					$this->redirect(Yii::app()->user->returnUrl);
				} else {
					echo json_encode($model->getErrors());
					exit();
				}
			}
		} 
		
		$this->render('login',array('loginUrl'=>$google_client->createAuthUrl()));//,array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		//Include Google Client Library for PHP autoload file
		require_once(Yii::getPathOfAlias('vendor') . '/autoload.php');
		require_once(Yii::getPathOfAlias('config') . '/gconfig.php');
		
		//Reset OAuth access token
		$google_client->revokeToken();
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}