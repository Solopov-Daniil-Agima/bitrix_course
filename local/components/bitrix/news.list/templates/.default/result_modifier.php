<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//dump($arParams);
if(!empty($arParams['PAGE_WIDTH']) && !empty($arParams['PAGE_HEIGHT'])){
    foreach($arResult["ITEMS"] as $cell=>$arElement)
    {
        if($arElement["PREVIEW_PICTURE"]["ID"])
        {
            $file = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"]["ID"],array('width' => $arParams['PAGE_WIDTH'],'height' => $arParams['PAGE_HEIGHT']), BX_RESIZE_IMAGE_EXACT, true);
            $arResult["ITEMS"][$cell]["PREVIEW_PICTURE"]['WIDTH'] = $file['width'];
            $arResult["ITEMS"][$cell]["PREVIEW_PICTURE"]['HEIGHT'] = $file['height'];
            $arResult["ITEMS"][$cell]["PREVIEW_PICTURE"]['SRC'] = $file['src'];
        }
    }
}
