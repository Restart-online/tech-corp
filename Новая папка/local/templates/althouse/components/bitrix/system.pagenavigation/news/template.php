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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="info-page__pagination pagination">
	<?if ($arResult["NavPageNomer"] > 1):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="pagination__arrow pagination__arrow--prev">
			<svg class="pagination__icon">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#pagination-arrow"></use>
			</svg>
		</a>			
	<?else:?>
		<a class="pagination__arrow pagination__arrow--disabled pagination__arrow--prev">
			<svg class="pagination__icon">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#pagination-arrow"></use>
			</svg>
		</a>
	<?endif?>

	
	<div class="pagination__list">
		<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
			<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>				
				<a href="#" class="pagination__link pagination__link--active"><?=$arResult["nStartPage"]?></a>
			<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="pagination__link"><?=$arResult["nStartPage"]?></a>
			<?else:?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" class="pagination__link"><?=$arResult["nStartPage"]?></a>
			<?endif?>
			<?$arResult["nStartPage"]++?>
		<?endwhile?>
		
	</div>
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="pagination__arrow pagination__arrow--next">
			<svg class="pagination__icon">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#pagination-arrow"></use>
			</svg>
		</a>
	<?else:?>
		<a class="pagination__arrow pagination__arrow--next">
			<svg class="pagination__icon">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#pagination-arrow"></use>
			</svg>
		</a>
	<?endif?>
	

</div>