<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);


if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}
?>
<section class="sidebar-page info-page">
    <div class="sidebar-page__container">
        <div class="sidebar-page__sidebar">
            <div data-spollers="992" class="menu-sidebar">
                <div class="menu-sidebar__spoller">
                    <button type="button" data-spoller class="menu-sidebar__title"><?$APPLICATION->IncludeFile(
                            "/local/include/about/sertifikaty/sidebar__title.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></button>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu", 
                        "inner", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "ROOT_MENU_TYPE" => "inner",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "inner"
                        ),
                        false
                    );?>
                    
                </div>
            </div>
            <div data-da=".sidebar-page__container, 992" class="info-page__form feedback">
                <div class="feedback__caption"><?$APPLICATION->IncludeFile(
                            "/local/include/stati/feedback__caption.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></div>
                <div class="feedback__description"><?$APPLICATION->IncludeFile(
                            "/local/include/stati/feedback__description.php", 
                            Array(), 
                            Array(
                                "MODE"      => "text",                                           
                                "NAME"      => "Редактирование включаемой области",      
                                "TEMPLATE"  => ""                    
                            ));
                        ?></div>
                        	<?$APPLICATION->IncludeComponent(
                            "asd:subscribe.quick.form",
                            "news",
                            Array(
                                "FORMAT" => "html",
                                "INC_JQUERY" => "N",
                                "NOT_CONFIRM" => "Y",
                                "RUBRICS" => array("2"),
                                "SHOW_RUBRICS" => "N"
                            )
                        );?>
                <?/*$APPLICATION->IncludeComponent("bitrix:subscribe.form",
                    "stati",
                    Array(
                            "USE_PERSONALIZATION" => "Y",
                            "PAGE" => "/stati/", 
                            "SHOW_HIDDEN" => "N", 
                            "CACHE_TYPE" => "A", 
                            "CACHE_TIME" => "3600" 
                        )
                );*/?>               
            </div>
        </div>
        <div class="sidebar-page__content">
            <div class="sidebar-page__caption"><?$APPLICATION->ShowTitle(false)?></div>
<?
if ($isVerticalFilter)
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_vertical.php");
else
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_horizontal.php");
?>
	        </div>
    </div>
</section>