<?php

namespace Apps\Helper;

class Session extends \Phalcon\Mvc\User\Component
{
	/**
	 * 設定登入資料
	 * @param $user array 使用者資料
	 */
	public function setSession($user)
	{
		$this->session->set("user", array(
			"name" => $user->name,
			"email" => $user->email,
			"role_name" => $user->role->name,
			"role_id" => $user->role->id
		));
	}

	/**
	 * 移除登入資料
	 * @param $user array 使用者資料
	 */
	public function removeSession()
	{
		$this->session->remove("user");
	}
}