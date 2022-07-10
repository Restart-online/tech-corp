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
<nav class="body-services__navigation">
	<?	
		foreach($arResult["SECTIONS"] as $sec) {
			#echo '<pre style="">';print_r($sec['SECTION']);echo '</pre>';
			$file = CFile::ResizeImageGet($sec['SECTION']['UF_ICON'], array('width'=>108, 'height'=>108), BX_RESIZE_IMAGE_EXACT);    
						
	?>
		<div class="body-services__title title-services">
			<div class="title-services__icon">
				<img src="<?=$file['src']?>" alt="<?=$sec['SECTION']['NAME']?>">
			</div>
			<div class="title-services__name"><?=$sec['SECTION']['NAME']?></div>
			<div class="title-services__arrow">
				<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.142883 5C0.142883 4.44772 0.590599 4 1.14288 4H14.8572C15.4095 4 15.8572 4.44772 15.8572 5C15.8572 5.55228 15.4095 6 14.8572 6H1.14288C0.590599 6 0.142883 5.55228 0.142883 5Z" fill="#1047C8" />
					<path fill-rule="evenodd" clip-rule="evenodd" d="M10.3406 0.483368C10.7311 0.0928443 11.3643 0.0928445 11.7548 0.483369L15.5643 4.29289C15.9548 4.68342 15.9548 5.31658 15.5643 5.70711L11.7548 9.51663C11.3643 9.90716 10.7311 9.90716 10.3406 9.51663C9.95004 9.12611 9.95004 8.49294 10.3406 8.10242L13.443 5L10.3406 1.89758C9.95004 1.50706 9.95004 0.873893 10.3406 0.483368Z" fill="#1047C8" />
				</svg>
			</div>
		</div>
	<?		
		}
	?>	
</nav>
<div hidden class="body-services__items">
	<?	
		foreach($arResult["SECTIONS"] as $sec) {
						
	?>
	<div hidden class="body-services__item item-services">
		<div class="item-services__head">
			<div class="item-services__back">
				<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.15032 23.6967L12.5224 30.1191L11.4357 31.2144L3.28578 23.0001L11.4357 14.7858L12.5224 15.881L6.30465 22.1478L42.7144 22.1478V23.6967L6.15032 23.6967Z" fill="#1047C8" />
				</svg>

				<span>все услуги</span>
			</div>
			<div class="item-services__title"><?=$sec['SECTION']['NAME']?></div>
		</div>
		<div class="item-services__body">
				<?	
					foreach($sec["ITEMS"] as $item) {
									
				?>
			<a href="<?=$item['DETAIL_PAGE_URL']?>" class="tabs-directions__item">
				
				<?if($item['DISPLAY_PROPERTIES']['POPULAR']['DISPLAY_VALUE']) {?>
					<div class="tabs-directions__image tabs-directions__image_popular">		
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/popular_star.svg" alt="arrow"> 
						<span>Популярная услуга</span>
					</div>
				<?		
					} else {
				?>	
					<div class="tabs-directions__image">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/arrow_white.svg" alt="arrow">
					</div>
				<?		
					}
				?>
			
				<span class="tabs-directions__text"><?=$item['NAME']?></span>
			</a>

			<?		
				}
			?>
		</div>
	</div>
	<?		
		}
	?>
</div>