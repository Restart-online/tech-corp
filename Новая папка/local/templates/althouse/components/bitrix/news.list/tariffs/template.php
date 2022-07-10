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

<?foreach($arResult["SERVICES"] as $service):
#echo '<pre style="">';print_r($service['SERVICE']);echo '</pre>';
	?>
	<div class="tariff-page__block">
        <div class="tariff-page__caption">
            <div class="tariff-page__subtitle"><?=$service['SERVICE']["DISPLAY_VALUE"]?></div>
            <div class="tariff-page__button">
                <a href="<?=$service['SERVICE']["LINK_ELEMENT_VALUE"][$service['SERVICE']["VALUE"]]['DETAIL_PAGE_URL']?>" class="button button--blue-outline">Подробнее об услуге</a>
            </div>
        </div>
        <div class="tariff-page__list">
<?
#echo '<pre style="">';print_r($service["ITEMS"]);echo '</pre>';
foreach($service["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	?>
	<div class="tariff" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="tariff__content">
			<div class="tariff__header">
				<div class="tariff__name"><?=$arItem['DISPLAY_PROPERTIES']['NAME']['DISPLAY_VALUE']?></div>
				<div class="tariff__price"><?=number_format($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'], 0, ',', ' ')?> &#8381; / мес.</div>
			</div>
			<div class="tariff__description">
				<?
					foreach($arItem['DISPLAY_PROPERTIES']['OPTIONS']['DISPLAY_VALUE'] as $k=>$o) {
					?>
						<div class="tariff__option">
							<span class="tariff__label"><?=$o?></span>
							<span class="tariff__value"><?=$arItem['DISPLAY_PROPERTIES']['OPTIONS']['DESCRIPTION'][$k]?></span>
						</div>
					<?
					}
				?>
				
			</div>
		</div>
		<div class="tariff__button">
			<div data-popup="#calculatorPopup" data-popup-info="Проконсультироваться" class="button button--blue button--block">Проконсультироваться</div>
		</div>
	</div>
	
<?endforeach;?>
	</div>
</div>
<?endforeach;?>