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
        if($arFields['IBLOCK_ID'] == 2){
            $db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arFields['ID'], array("sort" => "asc"), Array("CODE"=>"PRICE"));
            if($ar_props = $db_props->Fetch()) {
                if(strlen($arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE'] > 0)){
                    $arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE'] =  preg_replace("/[^\d]+/","", $arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE']);
                }
            }
        }

    }
}
?>