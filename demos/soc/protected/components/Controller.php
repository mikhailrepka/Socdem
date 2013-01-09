<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	/**
	 * @var string state of page element 'cover'.
	 * Takes 3 states:
	 * slideshow: shows photos from user's or group's album 
	 * tvonline: shows tv-player
	 * none: cover is not visible
	 */
	public $coverState = 'slideshow';
	/**
	 * @var array data for sidebar rendering
	 * view: view file that must be rendered by SidebarWidget
	 * data: array of data that must be contained in sidebar  
	 */
	public $sidebarData = array(
		'view'=>'default',
		'data'=>array(),
	);
	
	/**
	 * Creates deault main menu
	 * @return array menu elements
	 */
	public static function createDefaultMenu()
	{
		return array(
			array('label'=>'%home%', 'url'=>array('/site/index')),
			array('label'=>'%albums%', 'url'=>array('/site/albums')),
			array('label'=>'%tvonline%', 'url'=>array('/site/tvonline')),
			array('label'=>'%messages%', 'url'=>array('/site/messages')),
			array('label'=>'%login%', 'url'=>array('/login/'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'%logout% ('.Yii::app()->user->name.')', 'url'=>array('/login/logout'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'%registration%', 'url'=>array('/login/register'), 'visible'=>Yii::app()->user->isGuest),
		);
	}
}
