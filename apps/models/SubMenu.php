<?php

namespace Apps\Models;

class SubMenu extends \Phalcon\Mvc\Model
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
    public $main_menu_id;

	public function initialize()
	{
		$this->belongsTo(
            "main_menu_id",
            "Apps\Models\MainMenu",
            "id"
        );
	}

	public function getSource()
    {
        return "sub_menu";
    }
}