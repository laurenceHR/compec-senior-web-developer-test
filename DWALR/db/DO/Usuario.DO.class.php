<?php
///// DWA MODEL GENERATED v1.2 /////
// DWA-LR // DO->ARRAY //

// echo "_Usuario.DO.class.php_";

class UsuarioDO{

	var $id = null;	// id_item
	
	var $name = null;
	var $last_name = null;
	var $address = null;
	var $telephone = null;
	var $cellphone = null;
	var $avatar = null;

	protected $_table;

	function UsuarioDO($vars = null){
		if( isset($vars['id']) ){
			$this->id = $vars['id'];
		}
		if( isset($vars['name']) ){
			$this->name = $vars['name'];
		}
		if( isset($vars['last_name']) ){
			$this->last_name = $vars['last_name'];
		}
		if( isset($vars['address']) ){
			$this->address = $vars['address'];
		}
		if( isset($vars['telephone']) ){
			$this->telephone = $vars['telephone'];
		}
		if( isset($vars['cellphone']) ){
			$this->cellphone = $vars['cellphone'];
		}
		if( isset($vars['avatar']) ){
			$this->avatar = $vars['avatar'];
		}		

		$this->_table = new stdClass();
		$this->_table->id = 'id';
		$this->_table->name = 'name';
		$this->_table->last_name = 'last_name';
		$this->_table->address = 'address';
		$this->_table->telephone = 'telephone';
		$this->_table->cellphone = 'cellphone';
		$this->_table->avatar = 'avatar';
		
	}

}
?>
