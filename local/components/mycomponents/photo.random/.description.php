<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => "Случайный элемент",
    "DESCRIPTION" => "Показывает один случайный элемент",
    "ICON" => "/images/photo_view.gif",
    "CACHE_PATH" => "Y",
    "SORT" => 40,
    "PATH" => array(
        "ID" => "content",
        "CHILD" => array(
            "ID" => "catalog_ext",
            "NAME" => "Расширение каталога",
            "SORT" => 20,
        )
    ),
);

?>