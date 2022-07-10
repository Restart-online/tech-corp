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
$file = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>1200, 'height'=>1163), BX_RESIZE_IMAGE_EXACT);    
#echo '<pre style="">';print_r($arResult);echo '</pre>';		
?>
<section class="info-page info-page--detail">
	<div class="info-page__container">
		<div class="info-page__caption"><?=$arResult["NAME"]?></div>
		<div class="info-page__item info-item info-item--full">
			<div class="info-item__picture">
				<picture><source srcset="<?=$file['src']?>" type="<?=$arResult["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>"><img src="<?=$file['src']?>" alt="<?echo $arResult["NAME"]?>" class="interesting__image"></picture>										
			</div>
			<div class="info-item__information">
				<span class="info-item__views">
					<svg class="info-item__eye">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/icons/sprite.svg#views"></use>
					</svg>
					<?=$arResult['SHOW_COUNTER']?>
				</span>
				<span class="info-item__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
			</div>
			<div class="info-item__description">
				<?echo $arResult["DETAIL_TEXT"];?>
			</div>
			<div class="info-item__share">
				<script src="https://yastatic.net/share2/share.js?_v=20220525134951" defer></script>
				<div class="ya-share2" data-services="vkontakte,odnoklassniki,telegram,twitter,viber,whatsapp,moimir,skype"></div>
			</div>
			<div class="info-item__badge badge">
				<div class="badge__list">
					<?
					#echo '<pre style="">';print_r($arResult['DISPLAY_PROPERTIES']['TAGS']);echo '</pre>';
						foreach($arResult['DISPLAY_PROPERTIES']['TAGS']['LINK_ELEMENT_VALUE'] as $tag)  {
					?>
					<div class="badge__item">
						<a href="<?=$tag['DETAIL_PAGE_URL']?>" class="badge__label"><?=$tag['NAME']?></a>
					</div>
					<?		
						}
					?>
					
				</div>
			</div>
			<div class="info-item__back">
				<a href="<?=$arResult['LIST_PAGE_URL']?>" class="button button--blue">Все акции</a>
			</div>
		</div>
	</div>
</section>
