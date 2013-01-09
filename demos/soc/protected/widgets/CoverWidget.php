<?php

class CoverWidget extends CWidget
{
	public $state;
	
	public function init()
	{
		/*_*/
	}
	
	public function run()
	{
		if($this->state == 'slideshow')
			$this->renderSlideshow();
		elseif($this->state == 'tvonline')
			$this->renderTvOnline();
	}
	
	protected function renderSlideshow()
	{
		$this->render('application.widgets.views.cover.slideshow');
	}
	
	protected function renderTvOnline()
	{
		$this->render('application.widgets.views.cover.tvonline');
	}
}
