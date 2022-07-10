<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
CModule::IncludeModule("iblock");
foreach($arResult["ITEMS"] as &$arItem)
{
    $res = CIBlockElement::GetList(array(), array("ID" => $arItem["ID"]) , false, false, array("SHOW_COUNTER"));
    if($arRes = $res->GetNext())
    {
           $arItem["SHOW_COUNTER"] = intval($arRes["SHOW_COUNTER"]);
    }
}