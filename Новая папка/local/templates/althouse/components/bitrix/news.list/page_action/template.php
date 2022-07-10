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
<div class="info-page__list">
<?
$first = true;
#echo '<pre style="">';print_r($arResult["ITEMS"]);echo '</pre>';
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));							
	?>
	<?
	if($first) {
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>780, 'height'=>756), BX_RESIZE_IMAGE_EXACT);    
	?>
		<div class="info-item info-item--full" id="<?=$this->GetEditAreaId($arItem['ID']);?>">			
	<?
		$first = false;
	} else {
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>360, 'height'=>270), BX_RESIZE_IMAGE_EXACT);    
	?>
		<div class="info-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			
	<?	
	}
	?>
		<span class="info-item__picture">
			<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>" class="info-item__image"></picture>
		</span>
		<span class="info-item__information">
			
			<span class="info-item__views">
				<svg class="info-item__eye">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#views"></use>
				</svg>
				<?echo $arItem["SHOW_COUNTER"] ?? 0?>
			</span>
			<span class="info-item__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		</span>
		<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="info-item__caption"><?echo $arItem["NAME"]?></a>
		<span class="info-item__description">
			<?echo $arItem["PREVIEW_TEXT"];?>
		</span>
		<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="info-item__link">Читать</a>
	</div>
<?endforeach;?>

</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
