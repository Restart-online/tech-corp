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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?><div class="<? echo $arCurView['CONT']; ?>"><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?><h1
		class="<? echo $arCurView['TITLE']; ?>"
		id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
	><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
		echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
	?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<section class="directions">
    <div class="directions__gray"></div>
    <div class="directions__container">
        <div class="directions__head">
            <h2 class="directions__title">Направления деятельности</h2>
			<div class="directions__searchwrap">
				<div class="directions__search search-directions">
					<input type="text" name="" placeholder="Введите название услуги" id="" class="search-directions__input">
					<i class="search-directions__icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z" stroke="#BCBEC0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M15 15L21 21" stroke="#BCBEC0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</i>
				</div>
				<div class="search-directions__result"></div>
			</div>
        </div>
        <div class="directions__body">
            <div data-tabs class="tabs-directions">
                <nav data-tabs-titles class="tabs-directions__navigation">
					<?
						$cur = 1; 
						foreach ($arResult['SECTIONS'] as $arSection) {
							$active = '';
							if ( $cur == 1 ) {
								$active = '_tab-active';
							}							
							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);			
					?>
                    <button id="<? echo $this->GetEditAreaId($arSection['ID']); ?>" type="button" class="tabs-directions__title <? echo $active; ?>"><span><?=str_pad($cur, 2, '0', STR_PAD_LEFT);?></span><? echo $arSection['NAME']; ?></button>
					<?
							$cur++;
						}
					?>
                </nav>
                <div data-tabs-body class="tabs-directions__content">
					<?
						foreach ($arResult['SECTIONS'] as $arSection) {
					?>
						<div class="tabs-directions__body">
							<?
								foreach ($arResult['ELEMENTS'][$arSection['ID']] as $arElement) {
							?>
								<a class="tabs-directions__item" href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>">
									<div class="tabs-directions__image"><img src="<?=SITE_TEMPLATE_PATH?>/img/icons/arrow_white.svg" alt="arrow"></div>
									<span class="tabs-directions__text"><?=$arElement["NAME"]?></span>
								</a>
								<?						
								/*
							?> 
								<div class="tabs-directions__item">
									<div class="tabs-directions__image"><img src="<?=SITE_TEMPLATE_PATH?>/img/icons/arrow_white.svg" alt="arrow"></div>
									<span class="tabs-directions__text"><?=$arElement["NAME"]?></span>
								</div>
								<?						
								*/
							?> 
							<?						
								}
							?> 							
						</div>
					<?						
						}
					?>                   
                </div>
            </div>
        </div>
    </div>
</section>
<?

}
?>