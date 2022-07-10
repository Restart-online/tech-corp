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
if($arResult["ITEMS"]){
?>
	<section class="partners">
		<div class="partners__container">
			<div class="partners__head">
				<h2 class="partners__title">Наши партнеры</h2>
			</div>			
			<div class="partners__body">
				<div class="partners__slider swiper">
					<div class="partners__wrapper swiper-wrapper">
						<?foreach($arResult["ITEMS"] as $arItem):?>
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>350, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );    						
							
							?>
							<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="partners__item swiper-slide">
								<img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>">
						</div>
						<?endforeach;?>	
					</div>
				</div>
				<div class="partners__arrows">
					<div class="partners__arrow partners_arrow_prev">
						<img src="/local/templates/althouse/img/icons/long_prev.svg" alt="image">
					</div>
					<div class="partners__arrow partners_arrow_next">
						<img src="/local/templates/althouse/img/icons/long_next.svg" alt="image">
					</div>
				</div>
				<div class="partners__pagination"></div>
				<?/*foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>125, 'height'=>52), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );    						
					
					?>
					<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="partners__item swiper-slide">
					<picture><source srcset="<?=$file['src']?>" type="<?=$arItem["PREVIEW_PICTURE"]["CONTENT_TYPE"]?>">
					<img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>"></picture>
				</div>
				<?endforeach;*/?>	
			</div>
		</div>
	</section>
<?
}
?>