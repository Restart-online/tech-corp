<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/local/include/uslugi/detail/callback.php"
    ),
    false,
    array('HIDE_ICONS' => 'Y')
);?>

<?
global $arrFilterService;
$arrFilterService = array("!ID" => $arResult['ID'], "SECTION_ID" => $arResult['IBLOCK_SECTION_ID']);
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "service_list",
    Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NEWS_COUNT" => 20,
        "SORT_BY1" => $arParams["SORT_BY1"],
        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
        "SORT_BY2" => $arParams["SORT_BY2"],
        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => array(),
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "FILTER_NAME" => 'arrFilterService',
        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
    )
);?>			
<?
if (isset($arResult['STATI'])){
?>
<section class="computer__useful computer-useful">
	<div class="computer-useful__container">
		<div class="computer-useful__caption">
			<div class="computer-useful__title">
            <?$APPLICATION->IncludeFile(
                        "/local/include/uslugi/detail/useful__title.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование заголовка обраной связи",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
            </div>
			<a href="<?$APPLICATION->IncludeFile(
                        "/local/include/uslugi/detail/useful__href.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование заголовка обраной связи",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>" class="computer-useful__link">
                <?$APPLICATION->IncludeFile(
                        "/local/include/uslugi/detail/useful__link.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование заголовка обраной связи",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
                </a>
		</div>
		<div class="computer-useful__list">
		<?
		global $arrFilterArticle;
		#$arrFilterArticle = array("ID" => $arResult['STATI']);
		?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"article",
				Array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => 11,
					"NEWS_COUNT" => 3,
					"SORT_BY1" => $arParams["SORT_BY1"],
					"SORT_ORDER1" => $arParams["SORT_ORDER1"],
					"SORT_BY2" => $arParams["SORT_BY2"],
					"SORT_ORDER2" => $arParams["SORT_ORDER2"],
					"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
					"PROPERTY_CODE" => array(),
					"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
					"SET_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"MESSAGE_404" => $arParams["MESSAGE_404"],
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"FILE_404" => $arParams["FILE_404"],
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
					"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
					"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
					"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
					"FILTER_NAME" => 'arrFilterArticle',
					"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
					"CHECK_DATES" => $arParams["CHECK_DATES"],
				)
			);?>
					
		</div>
	</div>
</section>
<?
}
?>