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
			/*'page'=>array(
				'class'=>'CViewAction',
			),*/
		);
	}

	/**
	 * @return array controller's filters
	 */
	public function filters()
	{
		return array(
			array(
				'application.filters.AuthenticateFilter'
			),
		);
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->pageTitle=Yii::app()->name;
		$this->render('index');
	}
	
	/**
	 * Shows list of user's albums or content of chosen album
	 * @param bool $id chosen album's id in database
	 */
	public function actionAlbums($id=false)
	{
		$this->pageTitle = Yii::app()->name . ' - Albums';
		$this->breadcrumbs = array(
			'Albums',
		);
		
		$albums = Album::model()->findAll('user=:user', array('user'=>Yii::app()->user->id));
		
		if($id)
		{	
			// show album
			$album = Album::model()->findByPk($id);
			
			if($album === null)
				throw new CHttpException(404, 'Album not found');
			
			$this->pageTitle .= ' - ' . $album->title;
			$this->breadcrumbs = array(
				'Albums'=>array('site/albums'),
				$album->title,
			);
			$this->sidebarData['view'] = 'albums';
			$this->sidebarData['data'] = $albums;
			
			$photos = Photo::model()->findAll('album=:album', array('album'=>$id));
			
			$this->render('album', array('album'=>$album, 'photos'=>$photos));
		}
		else
		{
			// show all albums
			$this->render('albums', array('albums'=>$albums));
		}
	}

	/**
	 * Shows TV-online page
	 */
	public function actionTvOnline()
	{
		$this->pageTitle = Yii::app()->name . ' - TV-online';
		$this->breadcrumbs = array(
			'TV-online',
		);
		$this->coverState = 'tvonline';
		
		// shows tv-online
		$this->render('tvonline');
	}

	/**
	 * Shows user's messages
	 */
	public function actionMessages()
	{
		$this->pageTitle = Yii::app()->name . ' - Messages';
		$this->breadcrumbs = array(
			'Messages',
		);
		
		$this->menu = array(
			array('label'=>'%home%', 'url'=>array('/site/index')),
			array('label'=>'%messages%', 'url'=>array('/site/messages')),
			array('label'=>'%login%', 'url'=>array('/login/'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'%logout% ('.Yii::app()->user->name.')', 'url'=>array('/login/logout'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'%registration%', 'url'=>array('/login/register'), 'visible'=>Yii::app()->user->isGuest),
		);
		
		$this->coverState = 'none';
		
		// shows messages
		$this->render('messages');
	}
}
