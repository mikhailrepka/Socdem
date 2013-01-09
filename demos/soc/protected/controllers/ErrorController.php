<?php

class ErrorController extends Controller
{
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionIndex()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			$this->pageTitle=Yii::app()->name . ' - Error';
			$this->breadcrumbs=array(
				'Error',
			);
			
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('index', $error);
		}
	}
}
