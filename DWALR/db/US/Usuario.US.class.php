<?php 
// echo "_GaleriaItem.US.class.php_";
require_once $_DWALR_DA.'Usuario.DA.class.php';

class UsuarioUS{
	private $UsuarioDA;

	private $Usuario;

	function UsuarioUS(){
		$this->UsuarioDA = new UsuarioDA();
	}
	function tableName($table_name = null){
		if($table_name){ $this->UsuarioDA->stTable($table_name); }
		return $this->UsuarioDA->gtTable();
	}
	function listar($order = false,$limit = false){
		return $this->UsuarioDA->listar($order,$limit);
	}
	function seleccionar($id){		
		$Usuario = new UsuarioDO;
		$Usuario->id = $id;
		$rs = $this->UsuarioDA->seleccionar($Usuario);
		if($rs){$this->Usuario = $rs;}
		return $rs;
	}

	function agregar($Usuario){
		return $this->UsuarioDA->agregar($Usuario);
	}

	function actualizar($Usuario){
		return $this->UsuarioDA->actualizar($Usuario);
	}

	function reemplazar($Usuario_O,$Usuario_N){
		return $this->UsuarioDA->reemplazar($Usuario_O,$Usuario_N);
	}

	function borrar($Usuario){
		return $this->UsuarioDA->borrar($Usuario);
	}

	function buscar($cols,$order = false,$limit = false){
		return $this->UsuarioDA->buscar($cols,$order = false,$limit = false);
	}	
}
?>
