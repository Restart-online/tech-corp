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
$arrFilters = array();
/*
foreach($arResult["ITEMS"] as $arItem) {
	$arrFilters[$arItem["DISPLAY_PROPERTIES"]["SERVICE"]['LINK_ELEMENT_VALUE'][$arItem["DISPLAY_PROPERTIES"]["SERVICE"]["VALUE"]]['NAME']] = $arItem;
}
#echo '<pre style="">';print_r($arrFilters);echo '</pre>';
?>
<nav class="items-cases__navigation navigation-itemsCases">
	<div class="navigation-itemsCases__item">
		<input type="checkbox" data-cases-nav="all" name="" id="navigation-itemsCases__checkbox_all" class="navigation-itemsCases__checkbox">
		<label for="navigation-itemsCases__checkbox_all" class="navigation-itemsCases__label">Все</label>
	</div>
	<?
		foreach($arrFilters as $arItem) {
	?>
		<div class="navigation-itemsCases__item">
			<input <?=(isset($arItem["DISPLAY_PROPERTIES"]["CHECKED"]['DISPLAY_VALUE']) ? 'checked' : '')?> type="checkbox" data-cases-nav="<?=$arItem["DISPLAY_PROPERTIES"]["SERVICE"]['LINK_ELEMENT_VALUE'][$arItem["DISPLAY_PROPERTIES"]["SERVICE"]["VALUE"]]['NAME']?>" name="" id="navigation-itemsCases__checkbox_<?=$arItem["DISPLAY_PROPERTIES"]["SERVICE"]["VALUE"]?>" class="navigation-itemsCases__checkbox">
			<label for="navigation-itemsCases__checkbox_<?=$arItem["DISPLAY_PROPERTIES"]["SERVICE"]["VALUE"]?>" class="navigation-itemsCases__label"><?=$arItem["DISPLAY_PROPERTIES"]["SERVICE"]['LINK_ELEMENT_VALUE'][$arItem["DISPLAY_PROPERTIES"]["SERVICE"]["VALUE"]]['NAME']?></label>
		</div>
	<?		
		}
	?>	
</nav>
*/
?><?
foreach($arResult["ITEMS"] as $arItem) {
	foreach($arItem["DISPLAY_PROPERTIES"]["SERVICE"]['LINK_ELEMENT_VALUE'] as $el) {
		$arrFilters[$el['ID']] = $el;
	}
}
#echo '<pre style="">';print_r($arrFilters);echo '</pre>';
?>
<nav class="items-cases__navigation navigation-itemsCases">

	<?
		foreach($arrFilters as $arItem) {
			
	?>
		<div class="navigation-itemsCases__item">
			<input type="checkbox" data-cases-nav="<?=$arItem['NAME']?>" name="filter_case" id="navigation-itemsCases__checkbox_<?=$arItem["ID"]?>" class="navigation-itemsCases__checkbox">
			<label for="navigation-itemsCases__checkbox_<?=$arItem["ID"]?>" class="navigation-itemsCases__label"><?=$arItem['NAME']?></label>
		</div>
	<?		
		}
	?>	
</nav>

<div class="items-cases__body">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>330, 'height'=>280), BX_RESIZE_IMAGE_EXACT);    
		#echo '<pre style="">';print_r($arItem["DISPLAY_PROPERTIES"]["CHECKED"]['DISPLAY_VALUE']);echo '</pre>';
		$services = '';
			foreach($arItem["DISPLAY_PROPERTIES"]["SERVICE"]['LINK_ELEMENT_VALUE'] as $el) {
				$services .= $el['NAME'] . "||";
			}
		?>
		<?
		/*
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="items-cases__item item-itemsCases" <?=(isset($arItem["DISPLAY_PROPERTIES"]["CHECKED"]['DISPLAY_VALUE']) ? '' : 'hidden')?> data-cases-item="<?=$arItem["DISPLAY_PROPERTIES"]["SERVICE"]['LINK_ELEMENT_VALUE'][$arItem["DISPLAY_PROPERTIES"]["SERVICE"]["VALUE"]]['NAME']?>">
		
		*/
		?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="items-cases__item item-itemsCases" <?=(isset($arItem["DISPLAY_PROPERTIES"]["CHECKED"]['DISPLAY_VALUE']) ? '' : 'hidden')?> data-cases-item="<?=$services?>">
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="item-itemsCases__image">
				<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>"></picture>
				<div class="item-itemsCases__company"><?=$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["DISPLAY_VALUE"]?></div>
			</a>
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="item-itemsCases__name"><?echo $arItem["NAME"]?></a>
			<div class="item-itemsCases__text"><?echo $arItem["PREVIEW_TEXT"];?></div>
		</div>	
		<?endforeach;?>	
</div>