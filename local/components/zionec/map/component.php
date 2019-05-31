<?php
/**
 * @var $this CBitrixComponent
 * @var $arParams array
 * @var $arResult array
 * @var $APPLICATION CMain
 */
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$map = new Map();

if (isset($_GET['add']) && $_GET['name'] && $_GET['address'])
{
    $data['UF_NAME'] = $_GET['name'];
    $data['UF_ADDRESS'] = $_GET['address'];
    $addPoint = $map->AddPoint($data);
    _p($addPoint);
}

if (isset($_GET['delete']) && $_GET['id'])
{
    $ID = $_GET['id'];
    $deletePoint = $map->DeletePoint($ID);
    _p($deletePoint);
}

if (isset($_GET['update']) && $_GET['id'] && $_GET['name'] && $_GET['address'])
{
    $data['ID'] = $_GET['id'];
    $data['UF_NAME'] = $_GET['name'];
    $data['UF_ADDRESS'] = $_GET['address'];
    $updatePoint = $map->UpdatePoint($data);
    _p($updatePoint);
}

if (isset($_GET['getlist']))
{
    $mapList = $map->GetList();
    _p($mapList);
}

$this->IncludeComponentTemplate();