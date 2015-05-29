<?php

namespace Apps\Controllers;

/**
 * @RoutePrefix("/error")
 */
class ErrorController extends ControllerBase
{
	/**
     * @Get("/notfound")
     */
    public function notFoundAction()
    {
    	echo "sorry the page is not exists";
    }

    /**
     * @Get("/show401")
     */
    public function show401Action()
    {
    	echo "soory the permission is deny";
    	var_dump($this->session->get("user"));
    }
}
