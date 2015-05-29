<?php

namespace Apps\Models;

class MainMenu extends \Phalcon\Mvc\Model
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
     * @Column(type="varchar", nullable=false, column="class")
     */
    public $class;

	public function initialize()
	{
		$this->hasMany(
            "id",
            "Apps\Models\SubMenu",
            "main_menu_id", 
            array(
                "alias" => "subMenu"
            )
        );

        $this->hasMany(
            "id",
            "Apps\Models\Acl",
            "main_menu_id", 
            array(
                "alias" => "acl"
            )
        );
	}

	public function getSource()
    {
        return "main_menu";
    }
}