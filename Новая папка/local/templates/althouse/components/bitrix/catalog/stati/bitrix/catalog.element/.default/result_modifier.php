<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
#echo '<pre style="">';print_r($arResult['PROPERTIES']['INTERESTING']);echo '</pre>';
CModule::IncludeModule("iblock");
$arResult['INTERESTING'] = array();
if($arResult['PROPERTIES']['INTERESTING']['VALUE']) {
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID"=> $arParams['IBLOCK_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arResult['PROPERTIES']['INTERESTING']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arFields ["PREVIEW_PICTURE_RESIZE"] = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>360, 'height'=>350), BX_RESIZE_IMAGE_EXACT); 

        $arResult['INTERESTING'][] = $arFields ;
    }
}
/*
$arResult['LIKE'] = array();
if (CModule::IncludeModule("ylab.likes")) {
    
    $likes = \Ylab\Likes\YlabLikesTable::getContentStat($arResult['ID'], $arParams['IBLOCK_ID']);
    foreach($likes as $l) {
        $arResult['LIKE']['COUNT_LIKE'] += $l['COUNT_LIKE'];
        $arResult['LIKE']['COUNT_DISLIKE'] += $l['COUNT_DISLIKE'];
    }
}
*/
$cp = $this->__component;
#echo '<pre style="">';print_r($arResult['T']);echo '</pre>';
if (is_object($cp)){
    $cp->arResult['ID'] = $arResult['ID'];
    $cp->arResult['NAME'] = $arResult['NAME'];
    $cp->arResult['PREVIEW_TEXT'] = $arResult['NAME'];
    $cp->arResult['DETAIL_PAGE_URL'] = $arResult['DETAIL_PAGE_URL'];
    $cp->arResult['QUESTIONS'] = $arResult['PROPERTIES']['QUESTIONS']['VALUE'];
    $cp->arResult['FACTS'] = $arResult['PROPERTIES']['FACTS']['VALUE'];
    $cp->arResult['CASE'] = $arResult['PROPERTIES']['CASE']['VALUE'];
    $cp->arResult['CONSULTANT'] = $arResult['PROPERTIES']['CONSULTANT']['VALUE'];
    $cp->arResult['H_CONSULTANT'] = $arResult['PROPERTIES']['H_CONSULTANT']['VALUE'];
    $cp->arResult['NAME_BUTTON'] = $arResult['PROPERTIES']['NAME_BUTTON']['VALUE'];
    $cp->arResult['GRADE'] = $arResult['PROPERTIES']['GRADE']['VALUE'];
    $cp->arResult['NAME_MODAL'] = $arResult['PROPERTIES']['NAME_MODAL']['VALUE'];
    $cp->SetResultCacheKeys(array('ID', "NAME", 'DETAIL_PAGE_URL','PREVIEW_TEXT','QUESTIONS', 'FACTS', 'CASE', 'CONSULTANT', 'H_CONSULTANT', "NAME_MODAL", "NAME_BUTTON", "GRADE"));
}