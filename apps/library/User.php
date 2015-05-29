<?php

namespace Apps\Library;

use Apps\Models\User as UserModel;

class User extends \Phalcon\Mvc\User\Component
{
	public $user;

	public function __construct($email)
	{
		$this->user = UserModel::findFirstByEmail($email);	
	}

	/**
	 * 判斷使用者密碼是否正確
	 * @param $password string 密碼
	 * @return boolean
	 */
	public function checkPassword($password)
	{
		return $this->security->checkHash($password, $this->user->password);
	}

	/**
	 * 判斷使用者欄位是否有誤
	 * @param $data array 密碼
	 * @return boolean 
	 */
	public function checkField($data)
	{
        if ($data['newPassword'] !== $data['confirmedPassword']) {
            return false;
        }

        if (empty($data['name'])) {
        	return false;
        }

        return true;
	}

	/**
	 * 更新使用者資料
	 * @param $data array 密碼
	 * @return boolean 
	 */
	public function update($data)
	{
		$this->user->name = $data['name'];
        $this->user->password = $this->security->hash($data['npassword']);
		$this->user->updated_time = strtotime('now');
		return $this->user->save();
	}
}