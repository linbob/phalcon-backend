<?php

namespace Apps\Models;

class Role extends \Phalcon\Mvc\Model
{
	/**
     * @Primary
     * @Identity
     * @Column(type="integer", nullable=false, column="id")
     */
	public $id;

	/**
     * @Column(type="varchar", nullable=false, column="name")
     */
	public $name;

	public function initialize()
	{
		$this->hasMany(
            "id",
            "Apps\Models\User",
            "role_id", 
            array(
                "alias" => "user"
            )
        );

        $this->hasMany(
            "id",
            "Apps\Models\Acl",
            "role_id", 
            array(
                "alias" => "acl"
            )
        );
	}

	public function getSource()
    {
        return "role";
    }
}