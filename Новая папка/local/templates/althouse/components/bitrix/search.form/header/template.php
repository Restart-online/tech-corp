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
$this->setFrameMode(true);?>
<form data-da=".top-header__left, 767"  action="<?=$arResult["FORM_ACTION"]?>" class="bottom-header__search search-header">
	<input type="text" name="q" value="" id="" placeholder="Запрос" class="search-header__input">
	<input name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" style="display:none;"/>
	<i class="search-header__icon">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M15 15L21 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</i>
</form>
