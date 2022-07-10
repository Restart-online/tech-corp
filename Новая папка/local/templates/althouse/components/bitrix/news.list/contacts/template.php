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
$frame = new \Bitrix\Main\Page\FrameBuffered("my_dynamic_area"); // добавьте для композитного режима   
$frame->begin(); // добавьте для композитного режима
$checked = '';
$currentId = 1085; 
if (Bitrix\Main\Loader::includeModule('twofingers.location') && $location = \TwoFingers\Location\Storage::getLocation()) {
    $content = $location->getContent();
    if ($content) {
        $currentId =$content->getFieldValue('ID') ; 
		
		foreach($arResult["ITEMS"] as $key=>$arItem) {
			if($arItem['ID'] == $currentId) {
				$checked = 'checked';
				$arResult["ITEMS"][$key]['CHECKED'] = $checked;
				break;
			}
		}
    }
}

$frame->end(); // добавьте для композитного режима
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	 <div class="contacts__address-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<input class="contacts__radio" id="city_<?=$arItem['ID']?>" name="city" type="radio" <?if($arItem['PROPERTIES']['COORD']['VALUE']){?>data-center="<?=$arItem['PROPERTIES']['COORD']['VALUE']?>"<?}?> <?if($arItem['PROPERTIES']['COORD']['VALUE']){?>data-placemark="<?=$arItem['PROPERTIES']['COORD']['VALUE']?>"<?}?> <?=$arItem['CHECKED']?> <?
		if(!$checked){
			$checked=true;
			echo "checked";
		}
		?>>
		<label for="city_<?=$arItem['ID']?>">
			<div class="contacts__address-items">
				<div class="contacts__address-border">
					<p class="contacts__address-city contacts__address-item"><?=$arItem['NAME']?></p>
					<p class="contacts__address-item"><?=$arItem['DISPLAY_PROPERTIES']['ADDRESS']['DISPLAY_VALUE']?></p>
					<p><a href="mailto:<?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['DISPLAY_VALUE']?>" class="contacts__address-mail contacts__address-item"><?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['DISPLAY_VALUE']?></a></p>
					<p><a href="tel:<?=$arItem['DISPLAY_PROPERTIES']['PHONE']['DISPLAY_VALUE']?>" class="contacts__address-item contacts__address-tell"><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['DISPLAY_VALUE']?></a></p>
					<?
					foreach($arItem['DISPLAY_PROPERTIES']['WORK_TIME']['DISPLAY_VALUE'] as $v) {
					?>
						<p class="contacts__address-item"><?=$v?></p>
					<?	
					}
					?>
				</div>
			</div>
		</label>
	</div>	
<?endforeach;?>
