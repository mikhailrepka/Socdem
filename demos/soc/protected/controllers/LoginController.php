<?php

class LoginController extends Controller
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
		);
	}
	
	/**
	 * @return array controller's filters
	 */
	public function filters()
	{
		return array(
			array(
				'application.filters.AuthenticateFilter - index, register'
			),
		);
	}
	
	/**
	 * Displays the login page
	 */
	public function actionIndex()
	{
		if(!Yii::app()->user->isGuest)
			$this->redirect(Yii::app()->homeUrl);
		
		$this->pageTitle=Yii::app()->name . ' - Login';
		$this->breadcrumbs=array(
			'Login',
		);
		
		$model=new LoginForm;
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if(isset($_POST['LoginForm'])) 
		{
			$model->attributes=$_POST['LoginForm'];
			
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		
		$this->render('index',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Displays the register page
	 */
	public function actionRegister()
	{
		if(!Yii::app()->user->isGuest)
			$this->redirect(Yii::app()->homeUrl);
		
		$this->pageTitle=Yii::app()->name . ' - Register';
		$this->breadcrumbs=array(
			'Register',
		);
		
		$model = new RegisterForm;
		
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes = $_POST['RegisterForm'];
			
			if($model->validate() && $model->register())
			{
				$this->pageTitle=Yii::app()->name . ' - Register complete';
				$this->breadcrumbs=array(
					'Register complete',
				);
				
				$this->render('register_complete', array('username'=>$model->username));
			}
		}
		else
			$this->render('register', array('model'=>$model));
	}
}