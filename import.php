<?php
/**
 * Crea las clases que creas necesarias para hacer el trabajo.
 * Ten en cuenta que el archivo `users.csv`
 */

$_DWALR_US = 'DWALR/db/US/';
$_DWALR_DA = 'DWALR/db/DA/pdo/';
$_DWALR_DO = 'DWALR/db/DO/';

require $_DWALR_US.'Usuario.US.class.php';

$db = require __DIR__.'/db.php';

$UsuarioUS = new UsuarioUS();
$UsuarioUS->truncate();
$UsuarioLista = $UsuarioUS->leerTxt('users.csv','|','-');
foreach($UsuarioLista as $Usuario){
   	//print_r($Usuario);echo '<br/>';
   	
   	if(! $UsuarioUS->agregar($Usuario) ){
   		echo 'Error al Importar <br />';
   		print_r($Usuario);
   		echo '<br />';
   	}

}