<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Bitrix\Main\Page\Asset;
$asset = Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="ru" class=" subindex " prefix="og: http://ogp.me/ns#">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <?CJSCore::Init(array("fx"));?>
        <?$APPLICATION->ShowHead();?>
    </head>
    <body siteid="kp" langid="ru" class="">
        <?$APPLICATION->ShowPanel();?>