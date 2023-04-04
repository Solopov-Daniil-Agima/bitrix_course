<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arTempId = [];
$iblock_id = 2;
foreach ($arResult['ITEMS'] as $elem){
    $arTempId[] = $elem['PROPERTIES']['LINK']['VALUE'];
}

$arFilter = array(
    "IBLOCK_ID" => $iblock_id,
    "ACTIVE" => "Y",
    "ID" => $arTempId,
);

$arNavStartParams = array("nTopCount" => 50);

$arSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_PRICE", "PROPERTY_SIZE");

$bdRes = CIBlockElement::GetList(
    false,
    $arFilter,
    false,
    $arNavStartParams,
    $arSelect
);

$arResult["CAT_ELEM"] = [];
while($arRes = $bdRes->GetNext()){
    $arResult["CAT_ELEM"][$arRes["ID"]] = $arRes;
}
//dump($arResult["ITEM"]);
//dump($arResult["CAT_ELEM"]);


