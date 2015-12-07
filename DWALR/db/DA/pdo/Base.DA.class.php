<?php

class BaseDA{

	protected $db;
	protected $_table_name;
	
	function __construct($db = null){
		if($db == null){
			global $DB;
			$this->db = $DB;
		}else{
			$this->db = $db;
		}
	}

	protected function isReserved($txt){
		if($txt == 'NULL'){return true;}
		if($txt == 'NOT NULL'){return true;}
		if($txt == 'SYSDATE()'){return true;}
		return false;
	}

	protected function mkVal($txt){
		if($txt == 'NULL'){return $txt;}
		if($txt == 'NOT NULL'){return $txt;}
		if($txt == 'SYSDATE()'){return $txt;}
		return '"'. $txt . '"';
		//return "'".$txt."'";
	}

	// Function whrQry : Where Query

	protected function whrQry($colName,$colValue,$opt = null){
		if( substr($colValue,0,1) == '>'){return $colName." > ". substr($colValue,1);}
		if( substr($colValue,0,1) == '<'){return $colName." < ". substr($colValue,1);}
		if($colValue == 'NULL'){return $colName." IS NULL ";}
		if($colValue == 'NOT NULL'){return $colName." IS NOT NULL ";}
		if($colValue == 'SYSDATE()'){return $colName." = SYSDATE() ";}
		if($opt == 'number'){return $colName." = ".$colValue;}
		if($opt == 'varchar'){return $colName." LIKE '%".$colValue."%'";}
		return $colName." = '".$colValue."'";
	}

	// Function updQry : Update Query
	protected function updQry($colName,$colValue,$opt = null){
		if($colValue == 'NULL'){return $colName." = NULL ";}
		if($colValue == 'SYSDATE()'){return $colName." = SYSDATE() ";}
		if($opt == 'number'){return $colName." = ".$colValue;}
		return $colName." = '".$colValue."'";
	}
	
	public function stTable($table_name){
		$this->_table_name = $table_name;
	}
	public function gtTable(){
		return $this->_table_name;
	}
}


?>