<?php
function dump($elem){
    echo "<pre>";
    print_r($elem);
    echo "</pre>";
}
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
                if(strlen($arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE']) > 0){
                    $arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE'] =  preg_replace("/[^\d]/","", $arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE']);
                }
            }
        }

    }
}

//AddEventHandler("main", "OnBeforeEventAdd", array("MyClass", "OnBeforeEventAddHandler"));
//class MyClass
//{
//    public static function OnBeforeEventAddHandler(&$event, &$lid, &$arFields)
//    {
//        if ($event == "FEEDBACK_FORM"){
//            if(CModule::IncludeModule("iblock")){
//                $el = new CIBlockElement;
//                $arLoadProductArray = [
//                    "IBLOCK_ID" => 5,
//                    "NAME" => $arFields['AUTHOR'],
//                    "DETAIL_TEXT" => $arFields['TEXT'],
//                    "DATE_ACTIVE_FROM" => ConvertTimeStamp(false, "FULL"),
//                ];
//                $el->Add($arLoadProductArray);
//            }
//        }
//    }
//}

//AddEventHandler("main", "OnBeforeUserAdd", Array("MyClass", "OnBeforeUserAddHandler"));
//
//class MyClass
//{
//    // создаем обработчик события "OnBeforeUserAdd"
//    public static function OnBeforeUserAddHandler(&$arFields)
//    {
//        if($arFields["LAST_NAME"] == $arFields["NAME"])
//        {
//            global $APPLICATION;
//            $APPLICATION->throwException("Извините, но имя не может совпадать с фамилией.");
//            return false;
//        }
//    }
//}

?>