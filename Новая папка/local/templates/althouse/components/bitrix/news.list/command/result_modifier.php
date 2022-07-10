<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["SECTIONS"] = array();
foreach($arResult["ITEMS"] as $k=>$arItem) {
    $SECTION_ID = $arItem['IBLOCK_SECTION_ID'];
    $arItem["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>253, 'height'=>370), BX_RESIZE_IMAGE_EXACT);    
    $arResult["SECTIONS"][$SECTION_ID]["ITEMS"][]= $arItem;    
}

$arSelect = array("ID", "NAME", "DESCRIPTION", );
$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', "ID" => array_keys($arResult["SECTIONS"]));
$db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false, $arSelect);
while($ar_result = $db_list->GetNext()) {
    $arResult["SECTIONS"][$ar_result['ID']]['SECTION'] = $ar_result;
}
$arResult["CHUNK"] = array_chunk($arResult["SECTIONS"], 3);
#echo '<pre style="">';print_r($arResult["CHUNK"]);echo '</pre>';