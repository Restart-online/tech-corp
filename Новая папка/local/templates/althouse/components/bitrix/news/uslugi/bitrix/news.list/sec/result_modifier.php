<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
$arResult["SECTIONS"] = array();
foreach($arResult["ITEMS"] as $arItem){
    $SECTION_ID = $arItem['IBLOCK_SECTION_ID'];
    $arResult["SECTIONS"][$SECTION_ID]['ITEMS'][] = $arItem;
}
$arSelect = array("ID", "NAME", "DATEIL_PAGE_URL", "UF_ICON",);
$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', "ID" => array_keys($arResult["SECTIONS"]));
$db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false, $arSelect);
while($ar_result = $db_list->GetNext()) {
    $arResult["SECTIONS"][$ar_result['ID']]['SECTION'] = $ar_result;
}
#echo '<pre style="">';print_r($arResult["SECTIONS"]);echo '</pre>';