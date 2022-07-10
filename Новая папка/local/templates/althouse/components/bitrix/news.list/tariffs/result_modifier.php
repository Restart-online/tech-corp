<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
#echo '<pre style="">';print_r($arResult);echo '</pre>';
$arResult['SERVICES'] = array();
foreach($arResult["ITEMS"] as $arItem) {
    $service = $arItem['DISPLAY_PROPERTIES']['SERVICE']['VALUE'];
    $arResult['SERVICES'][$service]['SERVICE'] = $arItem['DISPLAY_PROPERTIES']['SERVICE'];
    $arResult['SERVICES'][$service]['ITEMS'][] = $arItem;
}
#echo '<pre style="">';print_r( $arResult['SERVICES']);echo '</pre>';
