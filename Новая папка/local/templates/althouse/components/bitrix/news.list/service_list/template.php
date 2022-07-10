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
<section class="computer__service computer-service">
	<div class="computer-service__container">
		<div class="computer-service__caption">
			<?$APPLICATION->IncludeFile(
                        "/local/include/uslugi/detail/service__caption.php", 
                        Array(), 
                        Array(
                            "MODE"      => "text",                                           
                            "NAME"      => "Редактирование заголовка обраной связи",      
                            "TEMPLATE"  => ""                    
                        ));
                    ?>
			</div>
		<div class="computer-service__list">
<?

#echo '<pre style="">';print_r($arResult["ITEMS"]);echo '</pre>';
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));							
	?>
	<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="computer-service__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<span><?echo $arItem["NAME"]?></span>
</a>	
<?endforeach;?>
		</div>
	</div>
</section>

