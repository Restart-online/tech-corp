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
#echo '<pre style="">';print_r($arResult["ITEMS"]);echo '</pre>';
?>
<div data-gallery class="sertificats-cases__body">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>360, 'height'=>250), BX_RESIZE_IMAGE_EXACT);    
		?>
		<a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="sertificats-cases__item">
			<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>"></picture>
		</a>
	<?endforeach;?>
</div>