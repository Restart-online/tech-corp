<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$cp = $this->__component;
#echo '<pre style="">';print_r($arResult);echo '</pre>';
CModule::IncludeModule("iblock");
$arResult['TARIFFS'] = array();
if($arResult['PROPERTIES']['TARIFFS']['VALUE']) {
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_NAME","PROPERTY_MINIMAL_PRICE","PROPERTY_PC_PRICE","PROPERTY_SERVER_PRICE","PROPERTY_OPTIONS",);
    $arFilter = Array("IBLOCK_ID"=> 17, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['PROPERTIES']['TARIFFS']['VALUE']);
    $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arResult['TARIFFS'][] = $arFields ;
    }
}
#echo '<pre style="">';print_r($arResult['TARIFFS']);echo '</pre>';
if (is_object($cp)){
    $cp->arResult['STATI'] = $arResult['PROPERTIES']['STATI']['VALUE'];
    $cp->arResult['ID'] = $arResult['ID'];
    $cp->arResult['IBLOCK_SECTION_ID'] = $arResult['IBLOCK_SECTION_ID'];
    $cp->SetResultCacheKeys(array('STATI','ID', 'IBLOCK_SECTION_ID'));
}