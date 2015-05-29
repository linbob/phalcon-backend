<?php

namespace Apps\Controllers;

use Apps\Library\User as UserLibrary;
use Apps\Helper\Session as SessionHelper;

/**
 * @RoutePrefix("/session")
 */
class SessionController extends \Phalcon\Mvc\Controller
{
    /**
     * @Route("/login", methods={"POST", "GET"})
     */
    public function loginAction()
    {
    	if ($this->request->isPost()) {
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            $userLibrary = new UserLibrary($email);

    		if ($userLibrary->checkPassword($password)) {
    			$sessionHelper = new SessionHelper();
                $sessionHelper->setSession($userLibrary->user);
 		        return $this->response->redirect("/");
    		}
    	}
    	
    	$this->view->pick('session/login');	
    }

    /**
     * @Route("/logout", methods={"GET"})
     */
    public function logoutAction()
    {
        SessionHelper::removeSession();
    	
    	$this->response->redirect("/session/login");	
    }
}
