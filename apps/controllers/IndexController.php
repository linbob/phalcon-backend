<?php

namespace Apps\Controllers;

/**
 * @RoutePrefix("/")
 */
class IndexController extends ControllerBase
{
	protected function initialize()
	{
		parent::initialize();
	}

	/**
     * @Get("/")
     */
    public function indexAction()
    {
        $this->assets->addJs('js/morris-data.js');
    	$this->view->pick("index");
    }
}
