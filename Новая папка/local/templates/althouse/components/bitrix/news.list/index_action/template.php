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
	$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>780, 'height'=>584), BX_RESIZE_IMAGE_EXACT);    						
	?>
	<section class="home-actions">
		<div class="home-actions__cnt">
			<div class="home-actions__content">
				<div class="home-actions_title sectiontitle"><?=$arItem["DISPLAY_PROPERTIES"]['INDEX_NAME']["DISPLAY_VALUE"]?></div>
				<div class="home-actions__links">
					<a href="#" data-popup="#actionHomePopup" data-popup-info="Забронировать акцию" class="home-actions__link rectangle_btn">Забронировать</a>
					<a href="/o-kompanii/aktsii/" class="home-actions__seall seall rectangle_btn">Все акции</a>
				</div>
			</div>
			<div class="home-actions__image">
				<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>"></picture>
			</div>
		</div>
	</section>
<?endforeach;?>
