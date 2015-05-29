<?php

namespace Apps\Models;

class Acl extends \Phalcon\Mvc\Model
{
	/**
     * @Primary
     * @Identity
     * @Column(type="integer", nullable=false, column="id")
     */
	public $id;

	/**
     * @Column(type="integer", nullable=false, column="role_id")
     */
	public $role_id;

    /**
     * @Column(type="integer", nullable=false, column="main_menu_id")
     */
    public $main_menu_id;

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

        $this->belongsTo(
            "main_menu_id",
            "Apps\Models\MainMenu",
            "id",
            array(
                "alias" => "mainMenu"
            )
        );
	}

	public function getSource()
    {
        return "acl";
    }
}