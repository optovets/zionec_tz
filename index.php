<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Zionec");
$APPLICATION->SetTitle("Zionec");

?>
<?
//_p($_REQUEST);

$APPLICATION->IncludeComponent("zionec:map", "", array());

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>