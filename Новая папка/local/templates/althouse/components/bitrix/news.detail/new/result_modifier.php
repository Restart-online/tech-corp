<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
$res = CIBlockElement::GetByID($arResult["ID"]);

if($ar_res = $res->GetNext())
    $arResult['SHOW_COUNTER'] = $ar_res['SHOW_COUNTER'];