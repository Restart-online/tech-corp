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
if($arResult["ITEMS"]){
?>
<div class="about-docs__slider swiper">
	<div data-gallery class="about-docs__wrapper swiper-wrapper">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>360, 'height'=>428), BX_RESIZE_IMAGE_EXACT);    
		
			?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="about-docs__slide swiper-slide">
				<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="about-docs__link">
				<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>"></picture>
			</a>
			</div>
		<?endforeach;?>
	</div>
	<div class="about-docs__navigation">
		<div class="swiper-button-prev">
			<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M11.67 1.86998L9.9 0.0999756L0 9.99998L9.9 19.9L11.67 18.13L3.54 9.99998L11.67 1.86998Z" fill="#1047C8" />
			</svg>
		</div>
		<div class="about-docs__pagination"></div>
		<div class="swiper-button-next">
			<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0.33 1.86998L2.1 0.0999756L12 9.99998L2.1 19.9L0.33 18.13L8.46 9.99998L0.33 1.86998Z" fill="#1047C8" />
			</svg>
		</div>
	</div>
</div>
<?	
}
?>