<?php

namespace Apps\Models;

class User extends \Phalcon\Mvc\Model
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

	/**
     * @Column(type="varchar", nullable=false, column="email")
     */
	public $email;

	/**
     * @Column(type="varchar", nullable=false, column="password")
     */
	public $password;

	/**
     * @Column(type="tinyint", nullable=false, column="role_id")
     */
	public $role_id;

	/**
     * @Column(type="integer", nullable=false, column="created_time")
     */
	public $created_time;

	/**
     * @Column(type="integer", nullable=false, column="updated_time")
     */
	public $updated_time;

	public function initialize()
	{
	    $this->belongsTo(
            "role_id",
            "Apps\Models\Role",
            "id",
            array(
                "alias" => "role"
            )
        );
	}

	public function getSource()
    {
        return "user";
    }
}