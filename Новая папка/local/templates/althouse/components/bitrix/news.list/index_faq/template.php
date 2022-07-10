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
$cur = 1; 
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="spollers__item faq-spollers__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<button type="button" data-spoller class="spollers__title faq-spollers__title title-faq">
			<div class="title-faq__number"><?=str_pad($cur, 2, '0', STR_PAD_LEFT);?></div>
			<div class="title-faq__text"><?echo $arItem["NAME"]?></div>
		</button>
		<div class="spollers__body faq-spollers__body">
			<?echo $arItem["PREVIEW_TEXT"];?>
		</div>
	</div>	
<?
$cur++;
endforeach;?>
