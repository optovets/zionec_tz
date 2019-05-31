<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
use \Bitrix\Highloadblock\HighloadBlockTable;

class Map
{
    private $hbMapClass;

    public function __construct()
    {
        if (!CModule::IncludeModule("iblock") || !CModule::IncludeModule("highloadblock"))
            return false;

        $rsData = HighloadBlockTable::getList(array(
            'filter' => array('NAME' => 'Map')
        ));

        if (!($arData = $rsData->fetch()))
        {
            return false;
        }

        $entityMap = HighloadBlockTable::compileEntity($arData);
        $this->hbMapClass = $entityMap->getDataClass();
    }

    public function GetList($arFilter = array(), $arSort = array())
    {
        $obQuery = new \Bitrix\Main\Entity\Query($this->hbMapClass);
        $obQuery->setSelect(array('*'));
        $obQuery->setFilter($arFilter);
        $obQuery->setOrder($arSort);

        $result = $obQuery->exec();
        $result = new CDBResult($result);

        while ($arMap = $result->Fetch())
        {
            $arMap['UF_CREATED_AT'] = $arMap['UF_CREATED_AT']->toString(new \Bitrix\Main\Context\Culture(
                array('FORMAT_DATETIME' => 'd.m.Y HH:MI:SS')
            ));

            $arMap['UF_UPDATED_AT'] = $arMap['UF_UPDATED_AT']->toString(new \Bitrix\Main\Context\Culture(
                array('FORMAT_DATETIME' => 'd.m.Y HH:MI:SS')
            ));

            $arPoints[] = $arMap;
        }
        return json_encode($arPoints, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function AddPoint($data)
    {
        if (!$data)
        {
            return false;
        }
        $data['UF_UPDATED_AT'] = ConvertTimeStamp(time(), 'FULL');
        $data['UF_CREATED_AT'] = ConvertTimeStamp(time(), 'FULL');

        $hbMapClass = $this->hbMapClass;
        $obResult = $hbMapClass::add($data);

        if ($obResult->isSuccess())
        {
            $arPointID = $obResult->getID();
        }
        return 'Добавлена запись с ID '.$arPointID;
    }

    public function UpdatePoint($data)
    {
        if (!$data)
        {
            return false;
        }

        $hbMapClass = $this->hbMapClass;

        $ID = $data['ID'];
        $name = $data['UF_NAME'];
        $address = $data['UF_ADDRESS'];

        $obResult = $hbMapClass::update($ID, array('UF_NAME' => $name, 'UF_ADDRESS' => $address, 'UF_UPDATED_AT' => ConvertTimeStamp(time(), 'FULL')));

        if ($obResult->isSuccess())
        {
            $arPointID = $obResult->getID();
        }
        return 'Обновлена запись с ID '.$arPointID;
    }

    public function DeletePoint($ID)
    {
        if (!$ID)
        {
            return false;
        }

        $hbMapClass = $this->hbMapClass;

        $obResult = $hbMapClass::delete($ID);
        if ($obResult->isSuccess())
        {
            $arPointID = $obResult->getID();
        }
        return 'Удалена запись с ID '.$arPointID;
    }
}
?>