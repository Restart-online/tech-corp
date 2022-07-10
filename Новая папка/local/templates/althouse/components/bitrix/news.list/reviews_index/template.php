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


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>360, 'height'=>508), BX_RESIZE_IMAGE_EXACT);    						
	?>
	<div class="home-reviews__slide slide-homeReviews swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="slide-homeReviews__head">
			<div class="slide-homeReviews__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
			<div class="slide-homeReviews__name"><?echo $arItem["PREVIEW_TEXT"];?></div>
			<div class="slide-homeReviews__post"><?echo $arItem["DISPLAY_PROPERTIES"]['POST']["DISPLAY_VALUE"]?></div>
		</div>
		<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="slide-homeReviews__body">
			<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>" class="slide-homeReviews__image"></picture>
		</a>
	</div>
<?endforeach;?>
