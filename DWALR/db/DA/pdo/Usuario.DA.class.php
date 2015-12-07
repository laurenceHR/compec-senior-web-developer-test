<?php 
///// DWA MODEL GENERATED v1.2 /////

// echo "_Usuario.DA.class.php_";
require_once "Base.DA.class.php";
require_once $_DWALR_DO.'Usuario.DO.class.php';

class UsuarioDA extends BaseDA{
	//protected $_table_name;	
	
	public function __construct(){
        parent::__construct();
		$this->_table_name = "users";		
    }    
	
	function listar($order = false,$limit = false){
		$tbl = $this->_table_name;$db = $this->db;
		$sql = "SELECT * FROM $tbl";//echo $sql."\n";
 
		/*** ORDER & LIMIT ***/ 
		if( $order ){ 
			if( is_array($order) ){ 
				foreach($order as $col => $ord){ $order_arr[] = $col.' '.$ord; } 
				$order_str = implode(',',$order_arr); 
			}else{ $order = false; } 
		} 
		if($order){ $sql .= " ORDER BY ".$order_str;} 
		if($limit){ $sql .= " LIMIT ".$limit;} 
		/*** ***/ 
 
		$rs_arr = $db->query($sql);		
		$ret = Array();
		foreach($rs_arr as $arr){
			$ret[] = new UsuarioDO($arr);
		}
		return $ret;
	}

	function seleccionar($Usuario){
		$tbl = $this->_table_name;$db = $this->db;

		// PrimaryKey no deben ser nulos // 
		if($Usuario->id == null){return false;}

		$pkCol[] = "id = ".$this->mkVal($Usuario->id);

		$sql = "SELECT * FROM $tbl WHERE ".implode(' AND ',$pkCol); // echo $sql."\n";
		$rs_arr = $db->query($sql);				
		if( count($rs_arr) > 0){
			foreach($rs_arr as $arr){
				$Usuario = new UsuarioDO($arr);
				return $Usuario;
			}
		}	
		return false;		
	}

	function agregar($Usuario){
		$tbl = $this->_table_name;$db = $this->db;
		
		if($Usuario->name != null){
			$insCol[] = "name"; 	$insVal[] = $this->mkVal($Usuario->name);
		}
		if($Usuario->last_name != null){
			$insCol[] = "last_name"; 	$insVal[] = $this->mkVal($Usuario->last_name);
		}
		if($Usuario->address != null){
			$insCol[] = "address"; 	$insVal[] = $this->mkVal($Usuario->address);
		}
		if($Usuario->telephone != null){
			$insCol[] = "telephone"; 	$insVal[] = $this->mkVal($Usuario->telephone);
		}
		if($Usuario->cellphone != null){
			$insCol[] = "cellphone"; 	$insVal[] = $this->mkVal($Usuario->cellphone);
		}
		if($Usuario->avatar != null){
			$insCol[] = "avatar"; 	$insVal[] = $this->mkVal($Usuario->avatar);
		}

		$sql = "INSERT INTO ".$tbl." (".implode(',',$insCol).") VALUES (".implode(',',$insVal).")"; // echo $sql;
		try{ $db->query($sql); return true; } catch (PDOException $e) {	return false; }
	}

	function actualizar($Usuario){
		$tbl = $this->_table_name;$db = $this->db;

		if($Usuario->id == null){return false;}
		$pkCol[] = $this->whrQry( "id" , $Usuario->id );
		
		if($Usuario->name != null){
			$updCol[] = $this->updQry( "name" , $Usuario->name );
		}
		if($Usuario->last_name != null){
			$updCol[] = $this->updQry( "last_name" , $Usuario->last_name );
		}
		if($Usuario->address != null){
			$updCol[] = $this->updQry( "address" , $Usuario->address );
		}
		if($Usuario->telephone != null){
			$updCol[] = $this->updQry( "telephone" , $Usuario->telephone );
		}
		if($Usuario->cellphone != null){
			$updCol[] = $this->updQry( "cellphone" , $Usuario->cellphone );
		}
		if($Usuario->avatar != null){
			$updCol[] = $this->updQry( "avatar" , $Usuario->avatar );
		}		

		$sql = "UPDATE ".$tbl." SET ".implode(',',$updCol)." WHERE ".implode(' AND ',$pkCol); //echo $sql;
		try{ $db->query($sql); return true; } catch (PDOException $e) {	return false; }
	}

	function reemplazar($Usuario_O,$Usuario_N){
		$tbl = $this->_table_name;$db = $this->db;

		if($Usuario_O->id == null){return false;}
		if($Usuario_N->id == null){return false;}
			// Old Object //
			$pkCol[] = $this->whrQry( "id" , $Usuario_O->id );
			//New Object //
			$updCol[] = $this->updQry( "id" , $Usuario_N->id );		
		
		if($Usuario->name != null){
			$updCol[] = $this->updQry( "name" , $Usuario->name );
		}
		if($Usuario->last_name != null){
			$updCol[] = $this->updQry( "last_name" , $Usuario->last_name );
		}
		if($Usuario->address != null){
			$updCol[] = $this->updQry( "address" , $Usuario->address );
		}
		if($Usuario->telephone != null){
			$updCol[] = $this->updQry( "telephone" , $Usuario->telephone );
		}
		if($Usuario->cellphone != null){
			$updCol[] = $this->updQry( "cellphone" , $Usuario->cellphone );
		}
		if($Usuario->avatar != null){
			$updCol[] = $this->updQry( "avatar" , $Usuario->avatar );
		}

		$sql = "UPDATE ".$tbl." SET ".implode(',',$updCol)." WHERE ".implode(' AND ',$pkCol);
		try{ $db->query($sql); return true; } catch (PDOException $e) {	return false; }
	}

	function borrar($Usuario = false){
		$tbl = $this->_table_name;$db = $this->db;
		$sql = "DELETE FROM $tbl";
		if($Usuario){
			if($Usuario->id == null){return false;}
			$pkCol[] = $this->whrQry( "id" , $Usuario->id );
			$sql .= " WHERE ".implode(' AND ',$pkCol);
		}
		//echo $sql."\n";
		try{ $db->query($sql); return true; } catch (PDOException $e) {	return false; }
	}

	function buscar($cols,$order = false,$limit = false){
		$tbl = $this->_table_name;$db = $this->db;

		foreach($cols as $colName => $colValue){
				$whrCol[] = $this->whrQry($colName,$colValue);
		}
		
		$sql = "SELECT * FROM $tbl WHERE ".implode(' AND ',$whrCol);
 
		/*** ORDER & LIMIT ***/ 
		if( $order ){ 
			if( is_array($order) ){ 
				foreach($order as $col => $ord){ $order_arr[] = $col.' '.$ord; } 
				$order_str = implode(',',$order_arr); 
			}else{ $order = false; } 
		} 
		if($order){ $sql .= " ORDER BY ".$order_str;} 
		if($limit){ $sql .= " LIMIT ".$limit;} 
		/*** ***/ 
		//echo $sql."\n";
 
		if($rs_arr = $db->query($sql)){			
			$ret = Array();
			foreach($rs_arr as $arr){
				$ret[] = new UsuarioDO($arr);
			}
			return $ret;
		}else{
			return false;
		}
	}

}
?>
