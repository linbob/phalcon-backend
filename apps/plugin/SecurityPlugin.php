<?php

namespace Apps\Plugin;

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;
use Apps\Models\Role as RoleModel;

class SecurityPlugin extends \Phalcon\Mvc\User\Plugin
{
	private function getAcl()
	{
		$acl = new AclList();

		$acl->setDefaultAction(Acl::DENY);

		//Register roles
		$roles = RoleModel::find();
		$aclRoles = array();
		foreach ($roles as $role) {
			$aclRoles["$role->name"] = new Role($role->name);
		}

		foreach ($aclRoles as $aclRole) {
			$acl->addRole($aclRole);
		}

		//Private area resources
		$privateResources = array(
			'index'     => array('index'),
			'user'     => array('profile'),
		);

		foreach ($privateResources as $resource => $actions) {
			$acl->addResource(new Resource($resource), $actions);
		}

		//Grant acess to private area to role Users
		foreach ($privateResources as $resource => $actions) {
			foreach ($actions as $action){
				$acl->allow('user', $resource, $action);
			}
		}

		if ($this->session->get('user')['role_name'] === "admin") {
			$acl->allow("admin", "*", "*");
			}

		return $acl;
	}

	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{
		/*if(!$role = $this->session->get('user')['role_name']) {
			$role = "guest";
		}

		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		$acl = $this->getAcl();

		$allowed = $acl->isAllowed($role, $controller, $action);

		if ($dispatcher->getControllerName() != "error" && $dispatcher->getControllerName() != "session") { 
			if ($allowed != Acl::ALLOW) {
				$dispatcher->forward(array(
					'controller' => 'error',
					'action'     => 'show401'
				));
				return false;
			}
		}*/
	}
}