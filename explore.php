<?php
/**
 * Crea las clases que creas necesarias para hacer el trabajo.
 * Ten en cuenta que el archivo `users.csv`
 */

$_DWALR_US = 'DWALR/db/US/';
$_DWALR_DA = 'DWALR/db/DA/sqlite/';
$_DWALR_DO = 'DWALR/db/DO/';

require $_DWALR_US.'Usuario.US.class.php';
//require $_DWALR_DA.'Usuario.DA.class.php';

$db = require __DIR__.'/db.php';

try {
    //$UsuarioDA = new UsuarioDA();
    //$Usuarios = $UsuarioDA->listar();
    $UsuarioUS = new UsuarioUS();
    $Usuarios = $UsuarioUS->listar();
    print_r($Usuarios);
    //$Usuario = $UsuarioUS->seleccionar(1);    
    //print_r($Usuario);
    $Usuario = new UsuarioDO;
    //$Usuario->id = 1;
    //$UsuarioUS->borrar($Usuario);
    //$Usuario->id = 2;
    //$Usuario->name = 'Laurence';
    //$Usuario->last_name = 'HR';
    //$Usuario->address = 'SJM';
    //$Usuario->telephone = '2856525';
    //$Usuario->cellphone = '941465757';
    //$Usuario->avatar = 'blank.jpg';
    //$UsuarioUS->actualizar($Usuario);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
