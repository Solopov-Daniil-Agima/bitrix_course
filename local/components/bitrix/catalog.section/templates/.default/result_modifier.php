<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

//dump($arResult['ITEMS']);

$arTempID = array();
foreach ($arResult['ITEMS'] as $elem){
    $arTempID[] = $elem['ID'];
}

$arFilter = array(
    "IBLOCK_ID" => 1,
    "ACTIVE" => "Y",
    "PROPERTY_LINK" => $arTempID,
);

$arNavStartParams = array("nTopCount" => 50);

$arSelect = array("ID", "NAME", "PROPERTY_LINK");

$bdRes = CIBlockElement::GetList(
    false,
    $arFilter,
    false,
    $arNavStartParams,
    $arSelect
);

$arResult["NEWS_ELEM"] = [];
while($arRes = $bdRes->GetNext()){
    $arResult["NEWS_ELEM"][$arRes["PROPERTY_LINK_VALUE"]] = $arRes;
}
dump($arResult["NEWS_ELEM"]);

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();