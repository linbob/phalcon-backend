<?php

namespace Apps\Controllers;

use Phalcon\Tag;
use Apps\Models\Acl as AclModel;
use Apps\Models\Role as RoleModel;

class ControllerBase extends \Phalcon\Mvc\Controller
{
	/**
	 * init
	 */
    protected function initialize()
    {
        Tag::setTitle("我也不知道是什麼的後台");

        if (!$user = $this->session->get("user")) {//判斷使用者是否有登入
    		$this->response->redirect("session/login");
    	}

        $acls = AclModel::findByRole_id($user['role_id']);//取得使用者權限

        $this->view->setVar("acls", $acls);
    }
}
