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
	function truncate(){
		return $this->UsuarioDA->borrar();
	}

	function buscar($cols,$order = false,$limit = false){
		return $this->UsuarioDA->buscar($cols,$order = false,$limit = false);
	}	

	function leerTxt($ruta,$sep,$sep2){
		$n = 0;
		$h = [];
		$b = [];
		$fp = fopen($ruta, "r");
		while(!feof($fp)) { $n++;
			$linea = fgets($fp);
			//echo $linea . "<br />";
			if($n == 1){
				$arr = explode($sep,$linea);
				foreach($arr as $x){ 
					$arr2 = explode($sep2,$x);					
					if(count($arr2)==1){
						$h[] = trim($x);
					}else{
						$hh = [];
						foreach($arr2 as $y){
							$hh[] = trim($y);
						}
						$h[] = $hh;
					}					
				}
				//print_r($h);exit;
			}else{
				$arr = explode($sep,$linea);
				$vars = [];
				foreach($arr as $i => $v){	
					$arr2 = explode($sep2,$v);
					if(count($arr2)==1){
						$vars[ $h[$i] ] = $v;
					}else{						
						foreach($arr2 as $j => $y){
							$vars[ $h[$i][$j] ] = $y;
						}						
					}					
				}				
				$Usuario = new UsuarioDO($vars);			
				$b[] = $Usuario;				
			}
		}
		fclose($fp);
		return $b;
	}
}
?>
