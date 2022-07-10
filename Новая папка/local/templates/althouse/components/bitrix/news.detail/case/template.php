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
<section class="case-page__detail case-detail">
	<div class="case-detail__container">
		<div class="case-detail__left">
			<h2><?=$arResult["NAME"]?></h2>
			<?echo $arResult["PREVIEW_TEXT"];?>
			<?
			if($arResult["DISPLAY_PROPERTIES"]['PROBLEMS']['DISPLAY_VALUE']){
			?>
				<h2>Проблемы клиента</h2>
				<ul>
					<?
						foreach($arResult["DISPLAY_PROPERTIES"]['PROBLEMS']['DISPLAY_VALUE'] as $val) {
					?>
					<li><?=$val?></li>
					<?
						}
					?>
				</ul>
			<?
			}
			?>
			<?
			if($arResult["DISPLAY_PROPERTIES"]['TASK']['DISPLAY_VALUE']){
			?>
				<h2>Задача</h2>
				<ol>
					<?
						foreach($arResult["DISPLAY_PROPERTIES"]['TASK']['DISPLAY_VALUE'] as $val) {
					?>
					<li><?=$val?></li>
					<?
						}
					?>
				</ol>
			<?
			}
			?>
		</div>
		<div class="case-detail__right">
			<div class="case-detail__content">
				<?
				if($arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DISPLAY_VALUE']){
					#echo '<pre style="">';print_r($arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']);echo '</pre>';
				?>
					<picture><source srcset="<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['DETAIL_PICTURE_RESIZE']['src']?>" type="image/webp"><img src="<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['DETAIL_PICTURE_RESIZE']['src']?>" alt="<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['NAME']?>" class="case-detail__image"></picture>
					<picture><source srcset="<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PREVIEW_PICTURE_RESIZE']['src']?>" type="image/webp"><img src="<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PREVIEW_PICTURE_RESIZE']['src']?>" alt="<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['NAME']?>" class="case-detail__logo"></picture>
					<h3><?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['NAME']?></h3>
					<h3><?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PROPERTY_HEADER_LIST_1_VALUE']?></h3>
					<ul>
						<?
							foreach($arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PROPERTY_LIST_1_VALUE'] as $val) {
						?>
						<li><?=$val?></li>
						<?
							}
						?>
					</ul>
					<h3><?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PROPERTY_HEADER_LIST_2_VALUE']?></h3>
					<ul>
						<?
							foreach($arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PROPERTY_LIST_2_VALUE'] as $val) {
						?>
						<li><?=$val?></li>
						<?
							}
						?>
					</ul>
					<?=$arResult["DISPLAY_PROPERTIES"]['ORGANIZATION']['DATA']['PREVIEW_TEXT']?>
				<?
				}
				?>
				
			</div>
		</div>
	</div>
</section>
<?
if($arResult["DISPLAY_PROPERTIES"]['STAGE']['DATA']) {
?>
<section class="case-page__stage stage">
	<div class="stage__container">
		<div class="stage__caption">Этапы работ</div>
		<div class="stage__list">
		<?
		foreach($arResult["DISPLAY_PROPERTIES"]['STAGE']['DATA'] as $stage) {
		?>	
			<div class="stage__item">
				<div class="stage__picture">
					<picture><source srcset="<?=$stage['PREVIEW_PICTURE_RESIZE']['src']?>" type="image/webp"><img src="<?=$stage['PREVIEW_PICTURE_RESIZE']['src']?>" alt="img <?=$stage['NAME']?>" class="stage__image"></picture>
				</div>
				<div class="stage__description">
					<?=htmlspecialcharsBack($stage['PREVIEW_TEXT'])?>
				</div>
			</div>
			<?
			}
			?>
		</div>
	</div>
</section>
<?
}
?>
<?
if($arResult["DISPLAY_PROPERTIES"]['PRICES']['DATA']) {
?>
<section class="case-page__cost cost">
	<div class="cost__container">
		<div class="cost__caption">Стоимость работ</div>
		<div class="cost__list">
			<?
			foreach($arResult["DISPLAY_PROPERTIES"]['PRICES']['DATA'] as $stage) {
				$unit = '&#8381; / мес.';
				if($stage['PROPERTY_UNIT_VALUE'])
					$unit = $stage['PROPERTY_UNIT_VALUE'];
			?>

			<div class="cost__item">
				<div class="cost__title"><?=$stage['NAME']?></div>
				<div class="cost__info">
					<div class="cost__price"><?=number_format($stage['PROPERTY_PRICE_VALUE'], 0, ',', ' ')?> <?=$unit?></div>
					<?
						if($stage['PROPERTY_TARIFF_VALUE_ARRAY']['PROPERTY_NAME_VALUE']){
					?>
					<div class="cost__tariff">Тарифный план «<?=$stage['PROPERTY_TARIFF_VALUE_ARRAY']['PROPERTY_NAME_VALUE']?>»</div>
					<?
					}
					?>
				</div>
			</div>
			<?
			}
			?>
		</div>
	</div>
</section>
<?
}
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/local/include/uslugi/detail/callback.php"
    ),
    false,
    array('HIDE_ICONS' => 'Y')
);?>
<?
if($arResult["DISPLAY_PROPERTIES"]['ARTICLES']['DATA']) {
	#echo '<pre style="">';print_r($arResult["DISPLAY_PROPERTIES"]['ARTICLES']);echo '</pre>';
?>
<section class="case-page__useful computer-useful">
	<div class="computer-useful__container">
		<div class="computer-useful__caption">
			<div class="computer-useful__title">Вам может быть полезно</div>
			<a href="/stati/" class="computer-useful__link">читать все статьи</a>
		</div>
		<div class="computer-useful__list">
			<?
			foreach($arResult["DISPLAY_PROPERTIES"]['ARTICLES']['DATA'] as $article) {
			?>
			<div class="interesting">
				<span class="interesting__picture">
					<picture><source srcset="<?=$article['PREVIEW_PICTURE_RESIZE']['src']?>" type="image/webp"><img src="<?=$article['PREVIEW_PICTURE_RESIZE']['src']?>" alt="<?=$article['NAME']?>" class="interesting__image"></picture>
				</span>
				<a href="<?=$article['DETAIL_PAGE_URL']?>" class="interesting__caption"><?=$article['NAME']?></a>
			</div>
			<?
				}
				?>			
		</div>
	</div> 
</section>
<?
}
?>