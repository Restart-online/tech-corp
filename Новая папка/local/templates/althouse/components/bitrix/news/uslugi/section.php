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
$this->setFrameMode(true);
?>
<?
$ID = $arResult['VARIABLES']["SECTION_ID"];

$arButtons = CIBlock::GetPanelButtons(
	$arParams["IBLOCK_ID"],
	0,
	$ID,
	array("SECTION_BUTTONS"=>true, "SESSID"=>false)
 );
$arSection['EDIT_LINK'] = $arButtons["edit"]["edit_section"]["ACTION_URL"];
$arSection['DELETE_LINK'] = $arButtons["edit"]["deletedelete_section_element"]["ACTION_URL"];
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
$this->AddEditAction($ID, $arSection['EDIT_LINK'], $strSectionEdit);
$this->AddDeleteAction($ID, $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                
$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$ID);
$res = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false, array("ID", "NAME","DESCRIPTION","PICTURE","UF_*"));
$ar_sec = $res->GetNext();
$ar_sec["PIC"] = CFile::ResizeImageGet($ar_sec["PICTURE"], array('width'=>719, 'height'=>960), BX_RESIZE_IMAGE_EXACT);    
$ar_sec["PIC_2"] = CFile::ResizeImageGet($ar_sec["UF_IMAGE"], array('width'=>720, 'height'=>900), BX_RESIZE_IMAGE_EXACT);    
$ar_sec["PIC_3"] = CFile::ResizeImageGet($ar_sec["UF_IMAGE_SERVICES"], array('width'=>182, 'height'=>822), BX_RESIZE_IMAGE_EXACT);   
#echo '<pre style="">';print_r($ar_sec);echo '</pre>';

?>
<section class="computer__header computer-header" id="<?php echo $this->GetEditAreaId($ID); ?>">
	<div class="computer-header__wrapper">
		<div class="computer-header__caption">
		<?$APPLICATION->ShowTitle(false)?>
		</div>
		<?
			if($ar_sec['UF_F_LIST']){
		?>
		<ul class="computer-header__list">
			<?
				foreach($ar_sec['UF_F_LIST'] as $list){
			?>
			<li class="computer-header__item"><?=$list?></li>
			<?
			}
			?>
		</ul>
		<?
		}
		?>
		<div class="computer-header__bottom">
			<div class="computer-header__consultation"><?=$ar_sec['UF_BEFORE_BUTTON']?></div>
			<div class="button button--blue computer-header__button" data-popup="#sectionServicePopup" data-popup-info="<?=$ar_sec['UF_NAME_MODAL']?>"><?=$ar_sec['UF_NAME_BUTTON']?></div>
		</div>
	</div>
	<div class="computer-header__background">
		<picture><source srcset="<?=$ar_sec["PIC"]['src']?>" type="<?=$ar_sec["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$ar_sec["PIC"]['src']?>" alt="<?echo $ar_sec["NAME"]?>" class="computer-header__picture"></picture>	
	</div>
</section>
<section class="computer__activity computer-activity">
	<div class="computer-activity__container">
		<div class="computer-activity__picture">
			<picture><source srcset="<?=$ar_sec["PIC_2"]['src']?>" type="<?=$ar_sec["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$ar_sec["PIC_2"]['src']?>" alt="<?echo $ar_sec["NAME"]?> 2" class="computer-activity__image"></picture>	
		</div>
		<div class="computer-activity__content">
			<div class="computer-activity__caption">
				<?=$ar_sec['UF_S_CAPTION']?>
			</div>
			<div class="computer-activity__description">
				<?echo $ar_sec["DESCRIPTION"]?>
			</div>
		</div>
	</div>
</section>
<section class="computer__work computer-work">
	<div class="computer-work__container">
		<div class="computer-work__logo">
			<picture><source srcset="<?=$ar_sec["PIC_3"]['src']?>" type="<?=$ar_sec["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$ar_sec["PIC_3"]['src']?>" alt="<?echo $ar_sec["NAME"]?> 3" class="computer-work__image"></picture>			
		</div>
		<div class="computer-work__content computer-service">
			<div class="computer-work__caption"><?=$ar_sec['UF_CAPTION_SERVICES']?></div>
			<div class="computer-work__list computer-service__list">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"",
					Array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"NEWS_COUNT" => $arParams["NEWS_COUNT"],
						"SORT_BY1" => $arParams["SORT_BY1"],
						"SORT_ORDER1" => $arParams["SORT_ORDER1"],
						"SORT_BY2" => $arParams["SORT_BY2"],
						"SORT_ORDER2" => $arParams["SORT_ORDER2"],
						"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
						"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
						"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"MESSAGE_404" => $arParams["MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
						"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
						"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
						"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
						"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
						"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
						"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
						"CHECK_DATES" => $arParams["CHECK_DATES"],
						"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

						"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
						"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
					),
					$component
				);?>
			</div>
		</div>
	</div>
</section>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/local/include/uslugi/callback.php"
    ),
    false,
    array('HIDE_ICONS' => 'Y')
);?>

<?
global $arrFilterArticle;
#if($arrFilterArticle = array("ID" => $ar_sec['UF_ARTICLE'])) {
?>

<section class="computer__useful computer-useful">
	<div class="computer-useful__container">
		<div class="computer-useful__caption">
			<div class="computer-useful__title"><?=$ar_sec['UF_CAPTION_USERFULL']?></div>
			<a href="<?=$ar_sec['UF_LINK_USERFULL']?>" class="computer-useful__link"><?=$ar_sec['UF_READ_USERFULL']?></a>
		</div>
		<div class="computer-useful__list">
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
#}
?>
