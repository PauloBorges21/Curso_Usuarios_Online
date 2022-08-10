<?php
include 'config.php';
include_once 'classes/acesso.class.php';

$acesso = new Acesso($pdo);

$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("America/Fortaleza");
$hora = date('H:i:s');

$acesso->registrarAcessos($ip,$hora);

