<?php
//if(file_exists($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/event_handler.php")){
//    require_once ($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/event_handler.php");
//}
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("CIBlockHandler", "OnBeforeIBlockElementUpdateHandler"));

class CIBlockHandler
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    public static function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
//        echo "<pre>";
//        var_dump($arFields);
//        echo "</pre>";
        $db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arFields['ID'], array("sort" => "asc"), Array("CODE"=>"PRICE"));
        while($ar_props = $db_props->Fetch()){
            fwrite(fopen($_SERVER["DOCUMENT_ROOT"]."/local/file.txt","a"),print_r($ar_props,true)."\n");
        }
        //fwrite(fopen($_SERVER["DOCUMENT_ROOT"]."/local/file.txt","a"),print_r($arFields,true)."\n");
    }
}
?>