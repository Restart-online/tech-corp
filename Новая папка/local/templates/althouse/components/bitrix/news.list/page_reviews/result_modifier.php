<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($arResult["ITEMS"])
$arResult["CHUNK"] = array_chunk($arResult["ITEMS"], 4);