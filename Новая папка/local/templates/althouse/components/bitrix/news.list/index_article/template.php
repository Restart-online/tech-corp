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
if($arResult["ITEMS"]) {
?>
	<section class="interesting news">
		<div class="news__container">
			<div class="news__head">
				<div class="news__title sectiontitle">Новые статьи</div>
				<a href="/stati/" class="news__seall seall">читать все статьи</a>
			</div>
			<div class="interesting__list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>390, 'height'=>350), BX_RESIZE_IMAGE_EXACT);    
						
				?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="interesting__item ">
					<span class="interesting__picture">
						<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>" class="interesting__image"></picture>							
						<span class="interesting__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
					</span>
					<span class="interesting__caption"><?echo $arItem["NAME"];?></span>
					<span class="interesting__description">
					<?echo $arItem["PREVIEW_TEXT"];?>
					</span>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="interesting__link">
						Читать
					</a>
				</div>
				<?endforeach;?>
			</div>
		</div>
	</section>
<?	
}
?>
