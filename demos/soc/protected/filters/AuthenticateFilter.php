<?php

class AuthenticateFilter extends CFilter
{
	public function preFilter($filterChain)
	{
		if(Yii::app()->user->isGuest) {
			Yii::app()->request->redirect(Yii::app()->params['loginPage']);
		}
		return true;
	}
	
	public function postFilter($filterChain)
	{
		/*_*/
	}
}