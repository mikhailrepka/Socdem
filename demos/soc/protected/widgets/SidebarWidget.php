<?php

class SidebarWidget extends CWidget
{
	public $data;
	
	public function init()
	{
		/*_*/
	}
	
	public function run()
	{
		if($this->data['view'] == 'default')
			$this->data['data'] = $this->getDefaultData();
		
		$this->render('application.widgets.views.sidebar.' . $this->data['view'], array('data'=>$this->data['data']));
	}
	
	protected function getDefaultData()
	{
		return array(
			'a', 'b', 'c',
		);
	}
}
