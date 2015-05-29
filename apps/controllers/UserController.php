<?php

namespace Apps\Controllers;

use Apps\Library\User as UserLibrary;

/**
 * @RoutePrefix("/user")
 */
class UserController extends ControllerBase
{
	protected function initialize()
	{
		parent::initialize();
	}

    /**
     * @Route("/profile", methods={"POST", "GET"})
     */
    public function profileAction()
    {
        if ($this->request->isPost()) {
            $data['name'] = $this->request->getPost("name");
            $data['password'] = $this->request->getPost("password");
            $data['newPassword'] = $this->request->getPost("n-password");
            $data['confirmedPassword'] = $this->request->getPost("re-password");

            $userLibrary = new UserLibrary($this->session->get('user')['email']);
            
            if (!$userLibrary->checkPassword($data['password'])) {
                $error = "舊密碼有誤&nbsp&nbsp&nbsp";
            }

            if (!$userLibrary->checkField($data)) {
                $error .="資料輸入有誤";
            }

        }

        $this->view->setVars(array(
            'name' => $this->session->get('user')['name'],
            'email' => $this->session->get('user')['email'],
            'error' => $error
        ));

    	$this->view->pick('user/index');
    }

    /**
     * @Route("/acl", method={"POST", "GET"})
     */
    public function aclAction()
    {

        $this->view->pick('user/acl');
    }

    /**
     * @Route("/settings", method={"POST", "GET"})
     */
    public function settingsAction()
    {
        
        $this->view->pick('user/settings');
    }
}
