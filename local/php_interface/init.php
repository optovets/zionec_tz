<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
ini_set('default_socket_timeout', '6000');

#
#	Функции
#
if (file_exists($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/functions.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php");
}