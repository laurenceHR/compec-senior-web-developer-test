<?php
/**
 * Devuelve la conexión a la base de datos
 *
 * @var PDO $db
 */
$DB = new PDO('sqlite:database.sqlite');
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//return $DB;
