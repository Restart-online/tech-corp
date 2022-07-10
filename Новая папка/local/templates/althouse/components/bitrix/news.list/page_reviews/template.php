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
	$star = 5;
?>
<?foreach($arResult["CHUNK"] as $chunk):?>
<div class="body-sertificats__slide slide-reviews swiper-slide">
	<div class="slide-reviews__items">
		<?foreach($chunk as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="slide-reviews__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="item-reviews__head">
					<div class="item-reviews__info">
						<div class="item-reviews__date item-reviews__gray"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
						<div class="item-reviews__name"><?echo $arItem["PREVIEW_TEXT"];?></div>
						<div class="item-reviews__post item-reviews__gray"><?echo $arItem["DISPLAY_PROPERTIES"]['POST']["DISPLAY_VALUE"]?></div>
					</div>
					<div class="item-reviews__ratings">
						<div class="rating slide-review__rating rating-review">
							<div class="rating-review__head">Уровень обслуживания</div>
							<div class="rating__body rating-review__body">
								<div class="rating__active rating-review__active"></div>
								<div class="rating__items rating-review__items">
									<?
										$i = 1;
										while($i <=$star) {
									?>
										<input type="radio" class="rating__item rating-review__item" value="<?=$i?>" name="LEVEL">
									<?		
											$i++;
										}
									?>
								</div>
							</div>
							<div class="rating__value rating-review__value"><?echo $arItem["DISPLAY_PROPERTIES"]['LEVEL']["DISPLAY_VALUE"]?></div>
						</div>
						<div class="rating slide-review__rating rating-review">
							<div class="rating-review__head">Скорость реагирования</div>
							<div class="rating__body rating-review__body">
								<div class="rating__active rating-review__active"></div>
								<div class="rating__items rating-review__items">
									<?
										$i = 1;
										while($i <=$star) {
									?>
										<input type="radio" class="rating__item rating-review__item" value="<?=$i?>" name="SPEED">
									<?		
											$i++;
										}
									?>
								</div>
							</div>
							<div class="rating__value rating-review__value"><?echo $arItem["DISPLAY_PROPERTIES"]['SPEED']["DISPLAY_VALUE"]?></div>
						</div>
						<div class="rating slide-review__rating rating-review">
							<div class="rating-review__head">Качество работ</div>
							<div class="rating__body rating-review__body">
								<div class="rating__active rating-review__active"></div>
								<div class="rating__items rating-review__items">
									<?
										$i = 1;
										while($i <=$star) {
									?>
										<input type="radio" class="rating__item rating-review__item" value="<?=$i?>" name="QUALITY">
									<?		
											$i++;
										}
									?>
								</div>
							</div>
							<div class="rating__value rating-review__value"><?echo $arItem["DISPLAY_PROPERTIES"]['QUALITY']["DISPLAY_VALUE"]?></div>
						</div>
					</div>
				</div>
				<div class="item-reviews__body">
					<?echo $arItem["DETAIL_TEXT"];?>
				</div>
				<div class="item-reviews__foot">
					<?
						if($arItem["DISPLAY_PROPERTIES"]['FILE']["DISPLAY_VALUE"]) {
					?>						
					<a target="_blank" href="<?echo $arItem["DISPLAY_PROPERTIES"]['FILE']['FILE_VALUE']['SRC']?>" class="item-reviews__file file-reviews">
						<div class="file-reviews__icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/sertificates/file_icon.svg" alt="image">
						</div>
						<div class="file-reviews__body">
							<?
							#echo '<pre style="">';print_r($arItem["DISPLAY_PROPERTIES"]['FILE']);echo '</pre>';
							
							?>
							<div class="file-reviews__gray"><?echo explode(".pdf", $arItem["DISPLAY_PROPERTIES"]['FILE']['FILE_VALUE']['ORIGINAL_NAME'])[0]?></div>
							<div class="file-reviews__gray"><?echo CFile::FormatSize($arItem["DISPLAY_PROPERTIES"]['FILE']['FILE_VALUE']['FILE_SIZE'])?></div>
						</div>
					</a>
					<?
						}
					?>
				</div>
			</div>
		<?endforeach;?>		
	</div>
</div>
<?endforeach;?>